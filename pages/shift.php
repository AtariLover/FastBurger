<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';
?>



<header class="bg-[#FA2FB5] text-black py-8">
    <div class="container mx-auto flex items-left">
        <div class="w-1">
            <h1 class="text-5xl" style="color: White;">Shifts</h1>
        </div>
        <div class="w-1"></div>
    </div>
</header>

<!-- component -->
<div class="container ml-20 mt-5">
	<table class="text-left w-full">
		<thead class="bg-[#31087B] flex text-white w-full">
			<tr class="flex w-full mb-4">
				<th class="p-4 w-1/4">One</th>
				<th class="p-4 w-1/4">Two</th>
				<th class="p-4 w-1/4">Three</th>
				<th class="p-4 w-1/4">Four</th>
			</tr>
		</thead>
    <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
		<tbody class="bg-[#FA2FB5] flex items-center justify-between overflow-y-scroll w-full h-full" style="height: 45vh; width: 85vw;">
			<tr class="flex w-full mb-4">
				<td class="p-4 w-1/4">Dogs</td>
				<td class="p-4 w-1/4">Cats</td>
				<td class="p-4 w-1/4">Birds</td>
				<td class="p-4 w-1/4">Fish</td>
			</tr>
			
		</tbody>
	</table>
</div>

<body style="background-color:#31087B">


<?php
include '../partials/footer.php';
?>