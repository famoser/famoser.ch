import os
from dotenv import load_dotenv
from pathlib import Path
env_path = Path('../') / '.env.local'
load_dotenv(dotenv_path=env_path)
github_token = os.getenv("GITHUB_API_TOKEN")

from loader import ProjectLoader

loader = ProjectLoader()
projects = loader.load()

from github import Github

github = Github(github_token)
for repo in github.get_user().get_repos():
    print(repo.name)

loader.store(projects)
