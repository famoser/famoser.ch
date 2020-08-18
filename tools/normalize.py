from loader import ProjectLoader

loader = ProjectLoader()
projects = loader.load()
loader.store(projects)
