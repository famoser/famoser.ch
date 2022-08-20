<?php

use Symfony\Component\Yaml\Yaml;

function getProjects(): array
{
    $projects = [];

    foreach (glob(__DIR__ . "/../projects/*.yaml") as $projectFilePath) {
        $project = getProject($projectFilePath);
        if (!isset($project["hide"]) || !$project["hide"]) {
            $projects[$project["last_activity_date"]][] = $project;
        }
    }

    krsort($projects);

    return array_merge(...array_values($projects));
}

function getProject(string $filePath)
{
    $fileContent = file_get_contents($filePath);
    $project = Yaml::parse($fileContent);

    /**
     * valid_languages = ["PHP", "C#", "JavaScript", "Python", "Kotlin"]
     * language_replaces = {"php": "PHP", "javascript": "JavaScript", "kotlin": "Kotlin"}
     * valid_frameworks = ["Symfony", "slim", "API Platform", "Sonata Admin", "Vue.js", "Angular", "ASP.NET", "Wordpress", "UWP", "WPF", "SyncApi", "wadmin"]
     * framework_replaces = {"vuejs": "Vue.js", "wordpress": "Wordpress", "symfony": "Symfony"}
     * valid_platforms = ["Web", "Windows", "Windows Phone", "Android"]
     *
     * taken from projects/normalize.py
     */

    $languageToClass = ["PHP" => "php", "C#" => "csharp", "JavaScript" => "javascript", "Python" => "python", "Kotlin" => "kotlin", "Java" => "java"];
    $frameworkToClass = ["Symfony" => "symfony", "Vue.js" => "vuejs", "Angular" => "angular", "ASP.NET" => "asp-net", "Wordpress" => "wordpress", "Play" => "play"];
    $platformToClass = ["Web" => "web", "Windows" => "windows", "Android" => "android"];

    $frameworkThatImpliesLanguage = [
        "Symfony" => "PHP",
        "Laravel" => "PHP",

        "UWP" => "C#",
        "Windows Forms" => "C#",
        "Asp.NET" => "C#",

        "Vue.js" => "JavaScript",
        "Angular" => "JavaScript",
        "React" => "JavaScript",

        "Slim" => "PHP",
        "Api Platform" => "PHP",

        "Play" => "Java",
        "Spring" => "Java",

        "Flutter" => "Dart",
    ];

    $frameworkThatImpliesPlatform = [
        "Flutter" => "Android",
        "Windows Forms" => "Windows"
    ];

    $classes = [];
    if (key_exists("frameworks", $project)) {
        foreach ($project["frameworks"] as $framework) {
            if (key_exists($framework, $frameworkToClass)) {
                $classes[] = $frameworkToClass[$framework];
            }

            if (key_exists($framework, $frameworkThatImpliesLanguage)) {
                $project["languages"][] = $frameworkThatImpliesLanguage[$framework];
            }

            if (key_exists($framework, $frameworkThatImpliesPlatform)) {
                $project["platform"] = $frameworkThatImpliesPlatform[$framework];
            }
        }
    }

    if (key_exists("languages", $project)) {
        $project["languages"] = array_unique($project["languages"]);
        foreach ($project["languages"] as $language) {
            if (key_exists($language, $languageToClass)) {
                $classes[] = $languageToClass[$language];
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

    if (key_exists("hours", $project)) {
        $hours = $project["hours"];
        if ($hours >= 300) {
            $classes[] = "hours-300-plus";
        }
    }

    $project["featured"] = isset($project["featured"]) && $project["featured"];
    $project["archived"] = isset($project["archived"]) && $project["archived"];
    if ($project["featured"]) {
        $classes[] = "featured";
    }
    if (!$project["archived"]) {
        $classes[] = "active";
    }

    $project["class"] = implode(" ", $classes);

    $project["languages"] = $project["languages"] ?? [];
    $project["frameworks"] = $project["frameworks"] ?? [];
    $project["hide"] = isset($project["hide"]) && $project["hide"];

    if (isset($project["last_relevant_activity_date"])) {
        $project["last_activity_date"] = $project["last_relevant_activity_date"];
    }

    return $project;
}
