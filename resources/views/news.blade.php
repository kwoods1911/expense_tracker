@extends('layouts.app')

@section('content')
<div class="mt-4 text-center text-4xl">
    <h1>Project Description</h1>
</div>

<div>
    <h3>El Cheapo - Expense Tracker</h3>
</div>

<div class="">
    <div class="mt-4">
        <p>Key Features</p>
      <ul>
        <li>Income & Budget Management – Users can input their income and set a budget to track their spending.</li>
        <li>Expense Tracking – Users can log expenses with details like category, amount, and date.</li>  
        <li>Receipt Uploads – Supports uploading, editing, and managing receipts in PDF or JPG format, stored securely in an AWS S3 bucket.</li>
        <li>Basic CRUD Operations – Users can create, read, update, and delete income, budget, and expense entries.</li>
        </ul>

<p>Tech Stack & Deployment:</p>


<ul>    
<li>Backend: Built with Laravel</li>
<li>Frontend: Tailwind and blade template engine. Chart.js for displaying the data on the dashboard</li>
<li>Storage: AWS S3 for receipt uploads.</li>
<li>Hosting: AWS EC2 instance (Free Tier) for MVP deployment.</li>
</ul>



<p>This project showcases my ability to build and deploy full-stack applications while integrating cloud services for scalable storage.</p>



       

    </div>

    <p>More details will be emailed soon.</p>
</div>


@endsection