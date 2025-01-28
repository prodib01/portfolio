<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 40px;
        }

        .header {
            border-bottom: 2px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 28px;
            margin: 0 0 10px 0;
            color: #2d3748;
        }

        .header p {
            margin: 5px 0;
            color: #4a5568;
        }

        section {
            margin-bottom: 30px;
        }

        h2 {
            font-size: 20px;
            color: #2d3748;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }

        .experience-item, .education-item {
            margin-bottom: 20px;
        }

        .experience-item h3, .education-item h3 {
            font-size: 16px;
            margin: 0 0 5px 0;
            color: #2d3748;
        }

        .company-date {
            color: #718096;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .description {
            margin-top: 10px;
            color: #4a5568;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill {
            background: #ebf4ff;
            color: #4299e1;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="header">
    <h1>{{ $user->name }}</h1>
    <p>{{ $user->email }}</p>
    @if($user->phone)
        <p>{{ $user->phone }}</p>
    @endif
    @if($user->location)
        <p>{{ $user->location }}</p>
    @endif
</div>

<div class="section">
    <h2>Work Experience</h2>
    @foreach($experiences as $experience)
        <div class="experience-item">
            <h3>{{ $experience->role }} at {{ $experience->company }}</h3>
            <p class="date">
                {{ $experience->start_date ? (is_string($experience->start_date) ? $experience->start_date : $experience->start_date->format('M Y')) : '' }}
                -
                {{ $experience->end_date ? (is_string($experience->end_date) ? $experience->end_date : $experience->end_date->format('M Y')) : 'Present' }}
            </p>
            <p>{{ $experience->description }}</p>
        </div>
    @endforeach
</div>

<div class="section">
    <h2>Education</h2>
    @foreach($educations as $education)
        <div class="education-item">
            <h3>{{ $education->degree }}</h3>
            <p>{{ $education->institution }} - {{ $education->graduation_year }}</p>
            @if($education->description)
                <p>{{ $education->description }}</p>
            @endif
        </div>
    @endforeach
</div>

<div class="section">
    <h2>Projects</h2>
    @foreach($projects as $project)
        <div class="project-item">
            <h3>{{ $project->title }}</h3>
            <p>{{ $project->description }}</p>
            @if($project->url)
                <p>URL: {{ $project->url }}</p>
            @endif
        </div>
    @endforeach
</div>

<div class="section">
    <h2>Skills</h2>
    <div class="skills">
        @foreach($skills as $skill)
            <span class="skill">{{ $skill->name }}</span>
        @endforeach
    </div>
</div>
</body>
</html>
