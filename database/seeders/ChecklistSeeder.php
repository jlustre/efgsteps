<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('checklists')->insert([
            // fap
            [
            'title' => 'Register with CIPR to get your CIPR Number',
            'type' => 'fap',
            'nthDayTarget' => '1',
            'sequence' => '1',
            'country' => 'ca',
            'instructions' => 'Go to this link and get your own CIPR# and save it: https://www.cipr.ca/registration/start.',
            ],
            [
            'title' => 'Enroll In HLLQP Online Self-Study Course',
            'type' => 'fap',
            'nthDayTarget' => '1',
            'sequence' => '2',
            'country' => 'ca',
            'instructions' => 'Go to this link and enroll: https://hllqp.remic.ca/hllqp-online.',
            ],
            [
            'title' => 'Meet And Greet With Your Executive Director (ED) or Sales Manager (SM)',
            'type' => 'fap',
            'nthDayTarget' => '2',
            'sequence' => '1',
            'country' => 'ca',
            'instructions' => 'Your upline advisor will introduce you to your Executive Director (ED) or (SM).',
            ],
            [
            'title' => 'Get Assigned To A Certified Field Trainor (CFT)',
            'type' => 'fap',
            'nthDayTarget' => '2',
            'sequence' => '2',
            'country' => 'ca',
            'instructions' => 'Your Executive Director (ED) or (SM) will assign you to a Certified Field Trainer (CFT).',
            ],
            [
            'title' => 'You will receive a "Welcome Letter" from your (CFT)',
            'type' => 'fap',
            'nthDayTarget' => '3',
            'sequence' => '1',
            'country' => 'ca',
            'instructions' => 'Attached in that email are the necessary forms that you need to fill up and complete.',
            ],
            [
            'title' => 'Fill up and Complete the forms for expectations, goals and commitments',
            'type' => 'fap',
            'nthDayTarget' => '3',
            'sequence' => '2',
            'country' => 'ca',
            'instructions' => 'Attached in that email are the necessary forms that you need to fill up and complete.',
            ],
            [
            'title' => 'Your CFT will call or contact you to set your first appointment meeting with him/her',
            'type' => 'fap',
            'nthDayTarget' => '3',
            'sequence' => '3',
            'country' => 'ca',
            'instructions' => 'Attached in that email are the necessary forms that you need to fill up and complete.',
            ],
            [
            'title' => 'Develop Top 50 Builders List, Aim for 100+ contacts',
            'type' => 'fap',
            'nthDayTarget' => '4',
            'sequence' => '1',
            'country' => 'ca',
            'instructions' => 'Use the memory jogger. This must be completed prior to first meeting with your CFT.',
            ],
            [
            'title' => 'Read and learn the scripts on "How To Invite"',
            'type' => 'fap',
            'nthDayTarget' => '5',
            'sequence' => '1',
            'country' => 'ca',
            'instructions' => 'Role play and practice with CFT. This must be completed prior to first meeting with your CFT.',
            ],
            [
            'title' => 'Using the scripts on "How To Invite",  book at least 4 appointments',
            'type' => 'fap',
            'nthDayTarget' => '6',
            'sequence' => '1',
            'country' => 'ca',
            'instructions' => 'Book at least two appointments for the 2nd week and 2 appointments for the 3rd week.',
            ],
            [
            'title' => 'You meet your CFT either in-person or online',
            'type' => 'fap',
            'nthDayTarget' => '7',
            'sequence' => '1',
            'country' => 'ca',
            'instructions' => 'Your CFT will confirm your goals, commitments and expectations.<br/>He/She will also explain the fast track program for SFA promotion.',
            ],
        ]);
    }
}