import yaml
import glob
import os
import ntpath
from normalizer import ProjectNormalizer

class ProjectLoader:
    def load(self):
        projects = []
        for filePath in glob.glob("../projects/*.yaml"):
            with open(filePath) as file:
                project = yaml.load(file, Loader=yaml.FullLoader)
                project["fileName"] = ntpath.basename(filePath)[:-5]
                projects.append(project)

        return projects

    def store(self, projects):
        # store projects
        normalizer = ProjectNormalizer()
        for project in projects:
            if "fileName" not in project:
                fileName = project["name"]
            else:
                fileName = project["fileName"]
                del project["fileName"]

            filePath = "../projects/" + fileName + ".yaml"
            print("writing " + filePath)

            content = normalizer.normalize(project)
            with open(filePath, "w") as file:
                file.write(content)

    def remove(self, filePath):
        os.remove(filePath)
