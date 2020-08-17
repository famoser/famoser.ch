<?php

use Symfony\Component\Yaml\Yaml;

function getProjects(): array
{
    $projects = [];

    foreach (glob(__DIR__ . "/../projects/*.yaml") as $projectFilePath) {
        $projects[] = getProject($projectFilePath);
    }

    return $projects;
}

function getProject(string $filePath)
{
    $fileContent = file_get_contents($filePath);
    $project = Yaml::parse($fileContent);

    /**
     *
     * valid_languages = ["PHP", "C#", "JavaScript", "Python", "Kotlin"]
     * language_replaces = {"php": "PHP", "javascript": "JavaScript", "kotlin": "Kotlin"}
     * valid_frameworks = ["Symfony", "slim", "API Platform", "Sonata Admin", "Vue.js", "Angular", "ASP.NET", "Wordpress", "UWP", "WPF", "SyncApi", "wadmin"]
     * framework_replaces = {"vuejs": "Vue.js", "wordpress": "Wordpress", "symfony": "Symfony"}
     * valid_platforms = ["Web", "Windows", "Windows Phone", "Android"]
     *
     * taken from projects/normalize.py
     */

    $languageToClass = ["PHP" => "php", "C#" => "csharp", "JavaScript" => "javascript", "Python" => "python", "Kotlin" => "kotlin"];
    $frameworkToClass = ["Symfony" => "symfony", "Vue.js" => "vuejs", "Angular" => "angular", "ASP.NET" => "asp.net", "Wordpress" => "wordpress"];
    $platformToClass = ["Web" => "web", "Windows" => "windows", "Android" => "android"];

    $classes = [];
    if (key_exists("languages", $project)) {
        foreach ($project["languages"] as $language) {
            if (key_exists($language, $languageToClass)) {
                $classes[] = $languageToClass[$language];
            }
        }
    }

    if (key_exists("frameworks", $project)) {
        foreach ($project["frameworks"] as $framework) {
            if (key_exists($framework, $frameworkToClass)) {
                $classes[] = $frameworkToClass[$framework];
            }
        }
    }

    if (key_exists("platform", $project)) {
        if ($project["platform"] == "Web") {
            $classes[] = "css-html";
        }
        if (key_exists($project["platform"], $platformToClass)) {
            $classes[] = $platformToClass[$project["platform"]];
        }
    }

    $project["class"] = implode(" ", $classes);

    return $project;
}
