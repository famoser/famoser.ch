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

ignore_repos = ["famoser/docs", "famoser/archive"]

github_whitelist = ["csharp", "php", "symfony", "vuejs", "uwp", "sync-api", "flutter", "android", "kotlin", "windows-forms", "windows-phone", "angular", "asp-net", "packagist", "nuget-package", "aur", "latex", "mkdocs", "slim-framework", "api-platform", "visual-studio-extension", "javascript"]
# ignore topics about the purpose of the package (because this is explained elsewhere)
ignore_whitelist = ["network-analysis", "bachelor-thesis", "netflix", "eth", "summaries", "crm-system", "lokalise", "console-application", "xkcd", "php-framework", "vseth", "compiler", "sync", "pdf-generation", "symfony-cli", "telemetry"]
platform_mapping = {"windows-forms": "Windows", "windows-phone": "Windows Phone", "visual-studio-extension": "Visual Studio Extension", "nuget-package": "Nuget", "android": "Android", "mkdocs": "Web", "packagist": "Packagist","aur": "AUR"}
blacklist = ["aur"]

normalizer = ProjectNormalizer()

def write_from_github(project, source):
    project["purpose"] = repo.description
    project["source_url"] = repo.html_url

    project["kickoff_date"] = repo.created_at.strftime("%Y-%m")
    project["last_activity_date"] = repo.pushed_at.strftime("%Y-%m")
    project["archived"] = repo.archived

    project["languages"] = []
    project["frameworks"] = []
    for topic in repo.get_topics():
        if topic in ignore_whitelist:
            continue

        if topic in blacklist:
            return False

        if topic not in github_whitelist:
            print("topic " + topic + " is not in whitelist.")

        if normalizer.is_language(topic):
            project["languages"].append(topic)
        elif normalizer.is_framework(topic):
            project["frameworks"].append(topic)
        elif topic not in ignore_whitelist and topic not in platform_mapping:
            print("topic " + topic + " could not be categorized.")

        if topic in platform_mapping:
            project["platform"] = platform_mapping[topic]


github = Github(github_token)
user = github.get_user()
for repo in user.get_repos():
    if repo.full_name in ignore_repos:
        pass
    elif repo.full_name in github_projects:
        print("updating " + repo.full_name)
        project = github_projects[repo.full_name]
        write_from_github(project, repo)
    elif repo.owner.login == user.login:
        project = {"name": repo.name}
        include = write_from_github(project, repo)
        if include:
            print("creating " + repo.full_name)
            github_projects[repo.full_name] = project
        else:
            print("skipping " + repo.full_name)

loader.store(github_projects.values())
