<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';
?>

<body style="background-color:#31087B">

<header class="bg-[#FA2FB5] text-black py-8">
    <div class="container mx-auto flex items-left">
        <div class="w-1">
            <h1 class="text-5xl" style="color: White;">Stock</h1>
        </div>
        <div class="w-1"></div>
    </div>
</header>


<!-- component -->
<div class="container m-auto mt-14">
	<table class="text-left w-4/5 m-auto">
		<thead class="bg-[#31087B] flex text-white w-full">
			<tr class="flex w-full mb-4">
				<th class="p-4 w-1/4">One</th>
				<th class="p-4 w-1/4">Two</th>
				<th class="p-4 w-1/4">Three</th>
				<th class="p-4 w-1/4">Four</th>
			</tr>
		</thead>
    <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
		<tbody class="bg-[#FA2FB5] flex items-center justify-between overflow-y-scroll w-full h-full" style="height: 45vh;">
			<tr class="flex w-full mb-4">
				<td class="p-4 w-1/4">Dogs</td>
				<td class="p-4 w-1/4">Cats</td>
				<td class="p-4 w-1/4">Birds</td>
				<td class="p-4 w-1/4">Fish</td>
			</tr>
			
		</tbody>
	</table>
</div>




<?php
include '../partials/footer.php';
?>