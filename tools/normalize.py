import yaml
import glob
from normalizer import ProjectNormalizer

# load projects
projects = {}
for filePath in glob.glob("../projects/*.yaml"):
    with open(filePath) as file:
        project = yaml.load(file, Loader=yaml.FullLoader)
        projects[filePath] = project


normalizer = ProjectNormalizer()

for filePath in projects:
    project = projects[filePath]

    print("processing " + filePath)

    content = normalizer.normalize(project)

    with open(filePath, "w") as file:
        file.write(content)
