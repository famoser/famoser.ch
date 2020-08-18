import os
from dotenv import load_dotenv
from pathlib import Path
env_path = Path('../') / '.env.local'
load_dotenv(dotenv_path=env_path)
github_token = os.getenv("GITHUB_API_TOKEN")

from loader import ProjectLoader
from normalizer import ProjectNormalizer

loader = ProjectLoader()
projects = loader.load()

github_projects = {}
for project in projects:
    if "source_url" in project and project["source_url"].startswith("https://github.com/"):
        url_length = len("https://github.com/")
        full_name = project["source_url"][url_length:]
        github_projects[full_name] = project


import time
from github import Github

github_whitelist = ["csharp", "php", "symfony"," vuejs", "uwp", "sync-api", "flutter", "android", "vuejs", "windows-forms", "windows-phone", "angular", "asp-net"]
ignore_whitelist = ["network-analysis", "bachelor-thesis", "netflix", "eth", "summaries", "crm-system", "aur", "lokalise", "console-application", "xkcd", "latex", "php-framework", "vseth", "compiler", "nuget-package", "sync", "pdf-generation"]
platform_mapping = {"forms": "Windows", "windows-phone": "Windows Phone", "visual-studio-extension": "Visual Studio Extension", "nuget-package", "Nuget"}
normalizer = ProjectNormalizer()

def write_from_github(project, source):
    project["purpose"] = repo.description
    project["source_url"] = repo.html_url

    project["kickoff_date"] = repo.created_at.strftime("%Y-%m")
    project["last_activity_date"] = repo.pushed_at.strftime("%Y-%m")

    project["languages"] = []
    project["frameworks"] = []
    for topic in repo.get_topics():
        if topic in ignore_whitelist:
            continue

        if topic not in github_whitelist:
            print("topic " + topic + " is not in whitelist.")

        if normalizer.is_language(topic):
            project["languages"].append(topic)
        elif normalizer.is_framework(topic):
            project["frameworks"].append(topic)
        elif topic not in ignore_whitelist:
            print("topic " + topic + " could not be categorized.")

        if topic in platform_mapping:
            project["platform"] = platform_mapping[topic]

github = Github(github_token)
user = github.get_user()
for repo in user.get_repos():
    if repo.full_name in github_projects:
        print("updating " + repo.full_name)
        project = github_projects[repo.full_name]
        write_from_github(project, repo)
    elif repo.owner.login == user.login:
        print("creating " + repo.full_name)
        project = {"name": repo.name}
        write_from_github(project, repo)
        github_projects[repo.full_name] = project


loader.store(projects)
