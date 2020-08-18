import os
from dotenv import load_dotenv
from pathlib import Path
env_path = Path('../') / '.env.local'
load_dotenv(dotenv_path=env_path)
github_token = os.getenv("GITHUB_API_TOKEN")

from loader import ProjectLoader

loader = ProjectLoader()
projects = loader.load()

github_projects = []
for project in projects:
    if "source_url" in project and project["source_url"].startswith("https://github.com")
        github_projects.append(project)

print(github_projects)

from github import Github

github = Github(github_token)
user = github.get_user()
for repo in user.get_repos():
    print(repo.name)
    

loader.store(projects)
