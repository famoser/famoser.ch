import yaml

class ProjectNormalizer:
    valid_languages = ["PHP", "C#", "JavaScript", "Python", "Kotlin", "latex"]
    language_replaces = {"csharp": "C#"}

    valid_frameworks = ["Symfony", "slim", "API Platform", "Sonata Admin", "Vue.js", "Angular", "Flutter", "ASP.NET", "Wordpress", "UWP", "WinRT", "WPF", "Windows Forms", "API Platform", "SyncApi", "wadmin"]
    framework_replaces = {"vuejs": "Vue.js", "sync-api": "SyncApi", "forms": "Windows Forms", "asp-net": "ASP.NET", "slim-framework": "slim", "api-platform": "API Platform", "Api Platform": "API Platform"}

    valid_platforms = ["Web", "Windows", "Windows Phone", "Android", "Nuget", "Visual Studio Extension", "Packagist", "AUR"]
    valid_employers = ["JKweb", "Zühlke", "unit.solutions"]

    valid_keys = ["name", "purpose", "implementation", "involvement", "employer", "publish_url", "source_url", "kickoff_date", "publish_date", "last_activity_date", "last_relevant_activity_date", "archived", "languages", "frameworks", "platform", "focus", "featured", "hours", "hidden"]

    def __init__(self):
        for language in self.valid_languages:
            self.language_replaces[language.lower()] = language
        for framework in self.valid_frameworks:
            self.framework_replaces[framework.lower()] = framework

    def __addMandatoryLine(self, lines, dictionary, key):
        if key not in dictionary:
            print("Fail: " + key + " not found")
            return

        lines.append(key + ": " + dictionary[key])

    def __addOptionalLine(self, lines, dictionary, key):
        if key not in dictionary:
            return

        lines.append(key + ": " + dictionary[key])

    def __addOptionalMultiline(self, lines, dictionary, key):
        if key not in dictionary:
            return

        lines.append(key + ": |")
        indentation = "  "
        lines.append(indentation + dictionary[key].replace("\n", "\n"+ indentation)[0:-3])

    def __addOptionalWhitelistedEntry(self, lines, dictionary, key, whitelist):
        if key not in dictionary:
            return

        if dictionary[key] not in whitelist:
            print("Fail: " + str(dictionary[key]) + " is not valid for key " + key)

        lines.append(key + ": " + str(dictionary[key]))

    def __addOptionalBooleanEntry(self, lines, dictionary, key):
        if key not in dictionary:
            return

        if not type(dictionary[key]) == bool:
            print("Fail: " + str(dictionary[key]) + " is not a boolean at " + key)

        output = "false"
        if dictionary[key]:
            output = "true"

        lines.append(key + ": " + output)

    def __addOptionalNumberEntry(self, lines, dictionary, key):
        if key not in dictionary:
            return

        if not type(dictionary[key]) == int:
            print("Fail: " + str(dictionary[key]) + " is not a number at " + key)

        lines.append(key + ": " + str(dictionary[key]))

    def __addOptionalUrlLine(self, lines, dictionary, key):
        if key not in dictionary:
            return

        if not dictionary[key].startswith("https://"):
            print("Fail: " + dictionary[key] + " is not a valid https url for key " + key)

        lines.append(key + ": " + dictionary[key])

    def __addOptionalMonthLine(self, lines, dictionary, key):
        if key not in dictionary:
            return

        if type(dictionary[key]) != str:
            print("Fail: " + str(dictionary[key]) + " is not a string, hence not a valid month for key " + key)
        elif len(dictionary[key]) != len("2020-02"):
            print("Fail: " + dictionary[key] + " is not a valid month for key " + key)

        lines.append(key + ": " + str(dictionary[key]))

    def __addOptionalWhitelistedList(self, lines, dictionary, key, whitelist, replaces = {}):
        if key not in dictionary:
            return

        result = set()
        for entry in dictionary[key]:
            if entry in replaces:
                value = replaces[entry]
            else:
                value = entry

            if value not in whitelist:
                print("Fail: " + value + " is not a valid entry for key " + key)

            result.add(value)

        if len(result) > 0:
            output = list(result)
            output.sort()
            lines.append(key + ": [" + ", ".join(output) + "]")

    def __checkOnlyValidKeys(self, dictionary, whitelist):
        for key in dictionary:
            if key not in whitelist:
                print("Fail: " + key + " is not a valid key")

    def __renameOptionalKey(self, dictionary, old, new):
        if old not in dictionary:
            return

        if new in dictionary:
            print("Fail: Both old key " + old + " and new key " + new + " exist.")

        dictionary[new] = dictionary[old]
        del dictionary[old]

    def is_framework(self, framework):
        return framework in self.valid_frameworks or framework in self.framework_replaces

    def is_language(self, language):
        return language in self.valid_languages or language in self.language_replaces

    def normalize(self, project):
        self.__renameOptionalKey(project, "description", "implementation")
        self.__checkOnlyValidKeys(project, self.valid_keys)

        lines = []
        self.__addMandatoryLine(lines, project, "name")
        self.__addMandatoryLine(lines, project, "purpose")
        self.__addOptionalMultiline(lines, project, "implementation")
        self.__addOptionalMultiline(lines, project, "involvement")
        self.__addOptionalWhitelistedEntry(lines, project, "employer", self.valid_employers)

        lines.append("")
        lengthBeforeGroup = len(lines)

        self.__addOptionalUrlLine(lines, project, "source_url")
        self.__addOptionalUrlLine(lines, project, "publish_url")

        if len(lines) > lengthBeforeGroup:
            lines.append("")
        lengthBeforeGroup = len(lines)

        self.__addOptionalMonthLine(lines, project, "kickoff_date")
        self.__addOptionalMonthLine(lines, project, "publish_date")
        self.__addOptionalMonthLine(lines, project, "last_activity_date")
        self.__addOptionalMonthLine(lines, project, "last_relevant_activity_date")
        self.__addOptionalBooleanEntry(lines, project, "archived")

        if len(lines) > lengthBeforeGroup:
            lines.append("")
        lengthBeforeGroup = len(lines)

        self.__addOptionalWhitelistedList(lines, project, "languages", self.valid_languages, self.language_replaces)
        self.__addOptionalWhitelistedList(lines, project, "frameworks", self.valid_frameworks, self.framework_replaces)
        self.__addOptionalWhitelistedEntry(lines, project, "platform", self.valid_platforms)
        self.__addOptionalLine(lines, project, "focus")
        self.__addOptionalNumberEntry(lines, project, "hours")

        if len(lines) > lengthBeforeGroup:
            lines.append("")
        lengthBeforeGroup = len(lines)

        self.__addOptionalBooleanEntry(lines, project, "featured")
        self.__addOptionalBooleanEntry(lines, project, "hide")

        return "\n".join(lines)
