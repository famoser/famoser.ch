import yaml
import glob

# load projects
projects = {}
for filePath in glob.glob("*.yaml"):
    with open(filePath) as file:
        project = yaml.load(file, Loader=yaml.FullLoader)
        projects[filePath] = project

# save projects
# do this manually bc I want an easy to understand resulting file
def addMandatoryLine(lines, dictionary, key):
    if key not in dictionary:
        print("Fail: " + key + " not found")
        return

    lines.append(key + ": " + dictionary[key])

def addOptionalMultiline(lines, dictionary, key):
    if key not in dictionary:
        return

    lines.append(key + ": |")
    indentation = "  "
    lines.append(indentation + dictionary[key].replace("\n", "\n"+ indentation)[0:-3])

def addOptionalWhitelistedEntry(lines, dictionary, key, whitelist):
    if key not in dictionary:
        return

    if dictionary[key] not in whitelist:
        print("Fail: " + dictionary[key] + " is not valid for key " + key)

    lines.append(key + ": " + dictionary[key])

def addOptionalUrlLine(lines, dictionary, key):
    if key not in dictionary:
        return

    if not dictionary[key].startswith("https://"):
        print("Fail: " + dictionary[key] + " is not a valid https url for key " + key)

    lines.append(key + ": " + dictionary[key])

def addOptionalMonthLine(lines, dictionary, key):
    if key not in dictionary:
        return

    if type(dictionary[key]) != str:
        print("Fail: " + str(dictionary[key]) + " is not a string, hence not a valid month for key " + key)
    elif len(dictionary[key]) != len("2020-02"):
        print("Fail: " + dictionary[key] + " is not a valid month for key " + key)

    lines.append(key + ": " + str(dictionary[key]))

def addOptionalWhitelistedList(lines, dictionary, key, whitelist, replaces = {}):
    if key not in dictionary:
        return

    result = []
    for entry in dictionary[key]:
        if entry in replaces:
            value = replaces[entry]
        else:
            value = entry

        if value not in whitelist:
            print("Fail: " + value + " is not a valid entry for key " + key)

        result.append(value)

    lines.append(key + ": [" + ", ".join(result) + "]")

def checkOnlyValidKeys(dictionary, whitelist):
    for key in dictionary:
        if key not in whitelist:
            print("Fail: " + key + " is not a valid key")

def renameOptionalKey(dictionary, old, new):
    if old not in dictionary:
        return

    if new in dictionary:
        print("Fail: Both old key " + old + " and new key " + new + " exist.")

    dictionary[new] = dictionary[old]
    del dictionary[old]

valid_languages = ["PHP", "C#", "JavaScript", "Python", "Kotlin"]
language_replaces = {"php": "PHP", "javascript": "JavaScript", "kotlin": "Kotlin"}
valid_frameworks = ["Symfony", "slim", "API Platform", "Sonata Admin", "Vue.js", "Angular", "ASP.NET", "Wordpress", "UWP", "WPF", "SyncApi", "wadmin"]
framework_replaces = {"vuejs": "Vue.js", "wordpress": "Wordpress", "symfony": "Symfony"}
valid_platforms = ["Web", "Windows", "Windows Phone", "Android"]
valid_employers = ["JKweb", "Zühlke"]

valid_keys = ["name", "purpose", "implementation", "involvement", "employer", "publish_url", "source_url", "kickoff_date", "publish_date", "last_activity_date", "languages", "frameworks", "platform"]

for filePath in projects:
    project = projects[filePath]

    print("processing " + filePath)

    renameOptionalKey(project, "description", "implementation")
    checkOnlyValidKeys(project, valid_keys)

    lines = []
    addMandatoryLine(lines, project, "name")
    addMandatoryLine(lines, project, "purpose")
    addOptionalMultiline(lines, project, "implementation")
    addOptionalMultiline(lines, project, "involvement")
    addOptionalWhitelistedEntry(lines, project, "employer", valid_employers)

    lines.append("")
    lengthBeforeGroup = len(lines)

    addOptionalUrlLine(lines, project, "public_url")
    addOptionalUrlLine(lines, project, "source_url")

    if len(lines) > lengthBeforeGroup:
        lines.append("")
    lengthBeforeGroup = len(lines)

    addOptionalMonthLine(lines, project, "kickoff_date")
    addOptionalMonthLine(lines, project, "publish_date")
    addOptionalMonthLine(lines, project, "last_activity_date")

    if len(lines) > lengthBeforeGroup:
        lines.append("")
    lengthBeforeGroup = len(lines)

    addOptionalWhitelistedList(lines, project, "languages", valid_languages, language_replaces)
    addOptionalWhitelistedList(lines, project, "frameworks", valid_frameworks, framework_replaces)
    addOptionalWhitelistedEntry(lines, project, "platform", valid_platforms)

    content = "\n".join(lines)
    with open(filePath, "w") as file:
        file.write(content)
