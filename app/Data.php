<?php

namespace App;

class Data
{
    const data = [
        "religion" => [
            'Hindu',
            'Islam',
            'Christian',
            'Sikh',
            'Buddism',
            'Jain',
            'Unaffilated',
            'Others'
        ],
        'emp_type'=>[
            'Teacher',
            'Administration',
            'Library'
        ],
        'gender'=>[
            'Male',
            'Female',
            'Other'
        ],
        'shift'=>[
            'Morning',
            'Normal',
            'Evening',
            'Morning and Normal',
            'Morning and Evening',
            'Normal and Evening',
            'All'
        ]

    ];

    const assesments=[
        [
            'Personal and Social Performance Assesment','01','options' =>[
                ['LeaderShip Skill','01.01',5,""],
                ['Personal Conduct','01.02',5,"Discipline, code of behaviour"],
                ['Critical Thinking','01.03',5,"Developing Argument, reflecting, evaluating, assessing, judging"],
                ['Solving Problems','01.04',5,'Identifying problems, clarifying problems, defining problems'],
                ['Developing Plans','01.05',5,'Analyzing Data, reviewing, planning and applying information'],
                ['Creativity','01.06',5,'Imagining, visualizing, designing, innovating'],
                ['Reasearch and Reporting','01.07',5,'Researching, investigating, interpreting, organizing information, reviewing and paraphrasing information, collecting data, searching and managing information sources, observing and interpreting'],
                ['Self Development and Personaity Mangement','01.08',5,'Working co-operatively, working independently, learning independently, being self-directed, managing time, managing tasks, organizing'],
                ['Communication','01.09',5,'Relationship with teacher and peers, one and two-way communication; communication within a group, verbal, written and non-verbal communication. Arguing, describing, advocating, interviewing, negotiating, presenting; using specific written forms'],
                ['Attendance','01.10',5,'Attendance of student'],
                ['Extracurricular activity','01.11',5,'Extracurricular activity'],
                ['Achivement in Extracurricular activity (Except Sports)','01.12',5,'Extracurricular activity'],
                ['Achievments in sports','01.13',5,'Achievments in sports'],


            ]
        ],
        [
            'Academic Performance Assement','02','options'=>[
                ['Academic potential','02.01',5,''],
                ['Academic achievement','02.02',5,''],
                ['Reading skill','02.03',5,''],
                ['Reading interest','02.04',5,''],
                ['Language Proficiency (oral/written)','02.05',5,''],
                ['Mathematical proficiency','02.06',5,''],
                ['Study habit','02.07',5,''],
             
            ]
        ]
      
    ];
}
