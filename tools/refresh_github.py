import os
from dotenv import load_dotenv
from pathlib import Path
env_path = Path('../') / '.env.local'
load_dotenv(dotenv_path=env_path)
github_token = os.getenv("GITHUB_API_TOKEN")

from loader import ProjectLoader

loader = ProjectLoader()
projects = loader.load()

github_projects = {}
for project in projects:
    if "source_url" in project and project["source_url"].startswith("https://github.com/"):
        url_length = len("https://github.com/")
        full_name = project["source_url"][url_length:]
        github_projects[full_name] = project

from github import Github

github = Github(github_token)
user = github.get_user()
for repo in user.get_repos():
    if repo.full_name in github_projects:
        print("updating " + repo.full_name)
        project = github_projects[repo.full_name]
        project["purpose"] = repo.description

loader.store(projects)
