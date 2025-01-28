<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Base styles */
        :root {
            --primary-color: #2563eb;
            --text-primary: #1f2937;
            --text-secondary: #4b5563;
            --bg-primary: #ffffff;
            --bg-secondary: #f3f4f6;
            --border-color: #e5e7eb;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            margin: 0;
            padding: 40px;
            background-color: var(--bg-secondary);
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: var(--bg-primary);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 40px;
        }

        .header {
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 24px;
            margin-bottom: 32px;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            margin: 0 0 16px 0;
            color: var(--text-primary);
            letter-spacing: -0.025em;
        }

        .header p {
            margin: 8px 0;
            color: var(--text-secondary);
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .two-columns {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
        }

        .column {
            flex: 1;
            min-width: 300px;
        }

        h2 {
            font-size: 24px;
            color: var(--text-primary);
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 8px;
            margin-bottom: 24px;
            font-weight: 600;
            letter-spacing: -0.025em;
        }

        .item {
            margin-bottom: 32px;
            padding-left: 20px;
            border-left: 2px solid var(--border-color);
        }

        h3 {
            font-size: 18px;
            margin: 0 0 8px 0;
            color: var(--text-primary);
            font-weight: 600;
        }

        .date {
            color: var(--text-secondary);
            font-size: 14px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .description {
            margin: 8px 0;
            color: var(--text-secondary);
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .skill {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
            padding: 6px 12px;
            border-radius: 16px;
            font-size: 14px;
            font-weight: 500;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>{{ $user->name }}</h1>
        <p>Email: {{ $user->email }}</p>
        @if($user->phone)
            <p>Phone: {{ $user->phone }}</p>
        @endif
        @if($user->location)
            <p>Location: {{ $user->location }}</p>
        @endif
    </div>

    <div class="two-columns">
        <!-- Column 1: User Details and Skills -->
        <div class="column">
            <h2>User Details</h2>
            <p>Email: {{ $user->email }}</p>
            @if($user->phone)
                <p>Phone: {{ $user->phone }}</p>
            @endif
            @if($user->location)
                <p>Location: {{ $user->location }}</p>
            @endif

            <h2>Skills</h2>
            <div class="skills">
                @foreach($skills as $skill)
                    <span class="skill">{{ $skill }}</span>
                @endforeach
            </div>
        </div>

        <!-- Column 2: Work Experience and Education -->
        <div class="column">
            <h2>Work Experience</h2>
            @foreach($experiences as $experience)
                <div class="item">
                    <h3>{{ $experience->role }} at {{ $experience->company }}</h3>
                    <p class="date">
                        {{ $experience->start_date ? (is_string($experience->start_date) ? $experience->start_date : $experience->start_date->format('M Y')) : '' }}
                        -
                        {{ $experience->end_date ? (is_string($experience->end_date) ? $experience->end_date : $experience->end_date->format('M Y')) : 'Present' }}
                    </p>
                    <p class="description">{{ $experience->description }}</p>
                </div>
            @endforeach

            <h2>Education</h2>
            @foreach($educations as $education)
                <div class="item">
                    <h3>{{ $education->degree }}</h3>
                    <p class="date">{{ $education->institution }} - {{ $education->graduation_year }}</p>
                    @if($education->description)
                        <p class="description">{{ $education->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
