import yaml
import glob
import os
from normalizer import ProjectNormalizer

class ProjectLoader:
    def load(self):
        projects = {}
        for filePath in glob.glob("../projects/*.yaml"):
            with open(filePath) as file:
                project = yaml.load(file, Loader=yaml.FullLoader)
                projects[filePath] = project

        return projects

    def store(self, projects):
        # store projects
        normalizer = ProjectNormalizer()
        for filePath in projects:
            print("writing " + filePath)

            content = normalizer.normalize(projects[filePath])
            with open(filePath, "w") as file:
                file.write(content)

    def remove(self, filePath):
        os.remove(filePath)
