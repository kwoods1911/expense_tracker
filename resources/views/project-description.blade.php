@extends('layouts.app')

@section('content')
<div class="mt-4 text-center text-4xl">
    <h1>Project Description</h1>
</div>

<div>
    <h3 class="mt-2 font-bold">El Cheapo - Expense Tracker</h3>
</div>

<p class="mt-2">El Cheapo is a simple expense tracker designed to help users manage their finances effectively.</p>

<h4 class="mt-4 font-bold">Instructions</h4>
<p>This application is extremely simple to use. </p>
<ul>
    <li>1. Add your <a href="/income" class="text-sky-700 underline font-bold">Income</a> </li>
    <li>2. Add your <a href="/budget" class="text-sky-700 underline font-bold"> Budgets</a></li>
    <li>3. Add your <a href="/expenses" class="text-sky-700 underline font-bold">Expenses</a></li>
    <li>4. Lastly view the data in the <a href="/dashboard" class="text-sky-700 underline font-bold">Dashboard</a></li>
</ul>
<p class="mt-2">The application includes the following features:</p>

<div class="">
    <div class="mt-4">
        <p class="font-bold text-2xl">Key Features</p>
        
    <ul>
        <li>Expense Notification - Users can set a threshold and receive a notification via email.</li>
        <li>Income & Budget Management – Users can input their income and set a budget to track their spending.</li>
        <li>Expense Tracking – Users can log expenses with details like category, amount, and date.</li>  
        <li>Receipt Uploads – Supports uploading, editing, and managing receipts in PDF or JPG format, stored securely in an <span class="font-bold">AWS S3 bucket.</span></li>
        <li>Basic CRUD Operations – Users can create, read, update, and delete income, budget, and expense entries.</li>
    </ul>

    
<p class="mt-4 font-bold text-2xl">Tech Stack & Deployment:</p>


<ul>    
    <li>Backend: Built with <span class="font-bold">Laravel</span></li>
    <li>Frontend: Tailwind and blade template engine. <span class="font-bold">Chart.js</span> for displaying the data on the dashboard</li>
    <li>Storage: <span class="font-bold">AWS S3</span> for receipt uploads.</li>
    <li>Hosting: <span class="font-bold">AWS EC2 instance</span> for deployment.</li>
</ul>

<p>This project showcases my ability to build and deploy full-stack applications while integrating cloud services for scalable storage.</p>
</div>

    <p>More details will be added soon.</p>
</div>


@endsection