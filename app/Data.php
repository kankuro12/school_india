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

    const pageTypes=[
        'dept'=>['Department','Departments',[],false,null,true,'Description'],
        'about'=>['About Us','About Us',[],false,null,true,'Description'],
        'fac'=>['Facility','Facilities',[],false,null,true,'Description'],
        'not'=>['Notice','Notices',[],true,'file|single|Downloads',false,'Content'],
        'prog'=>['Program','Programs',[
            'prog_01'=>'Fee Structre',
            'prog_02'=>'Lab',
            'prog_03'=>'Scholorship Scheme',
            'prog_04'=>'Achivements'
        ],true,'gallery|multiple|Gallery',true,'Description']
    ];

    const assesments=[
        [
            'name'=>'Personal and Social Performance Assessment','code'=>'01','options' =>[
                ['LeaderShip Skill','01_01',5,""],
                ['Personal Conduct','01_02',5,"Discipline, code of behaviour"],
                ['Critical Thinking','01_03',5,"Developing Argument, reflecting, evaluating, assessing, judging"],
                ['Solving Problems','01_04',5,'Identifying problems, clarifying problems, defining problems'],
                ['Developing Plans','01_05',5,'Analyzing Data, reviewing, planning and applying information'],
                ['Creativity','01_06',5,'Imagining, visualizing, designing, innovating'],
                ['Reasearch and Reporting','01_07',5,'Researching, investigating, interpreting, organizing information, reviewing and paraphrasing information, collecting data, searching and managing information sources, observing and interpreting'],
                ['Self Development and Personaity Mangement','01_08',5,'Working co-operatively, working independently, learning independently, being self-directed, managing time, managing tasks, organizing'],
                ['Communication','01_09',5,'Relationship with teacher and peers, one and two-way communication; communication within a group, verbal, written and non-verbal communication. Arguing, describing, advocating, interviewing, negotiating, presenting; using specific written forms'],
                ['Attendance','01_10',5,'Attendance of student'],
                ['Extracurricular activity','01_11',5,'Extracurricular activity'],
                ['Achivement in Extracurricular activity (Except Sports)','01_12',5,'Extracurricular activity'],
                ['Achievments in sports','01_13',5,'Achievments in sports'],


            ]
        ],
        [
            'name'=>'Academic Performance Assessment','code'=>'02_00','options'=>[
                ['Academic potential','02_01',5,''],
                ['Academic achievement','02_02',5,''],
                ['Reading skill','02_03',5,''],
                ['Reading interest','02_04',5,''],
                ['Language Proficiency (oral/written)','02_05',5,''],
                ['Mathematical proficiency','02_06',5,''],
                ['Study habit','02_07',5,''],
             
            ]
        ]
      
    ];
}
