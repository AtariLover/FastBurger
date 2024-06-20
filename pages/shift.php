<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';
?>



<header class="bg-[#FA2FB5] text-black py-6">
    <div class="container mx-auto flex items-left">
        <div class="w-1">
            <h1 class="text-5xl" style="color: White;">Shifts</h1>
        </div>
        <div class="w-1"></div>
    </div>
</header>

<?php
$staff = $conn->prepare("SELECT 
s.staff_firstname,
s.staff_surname,
s.staff_role,
s.staff_shift
FROM `staff` s
GROUP BY s.staff_id, s.staff_firstname, s.staff_surname, s.staff_shift
;
");
$staff->execute();
$staff->store_result();
$staff->bind_result($firstName, $surname, $role, $shift);
?>
<div class="overflow-hidden rounded-lg border border-[#31087B] shadow-md m-5" style="max-height: 450px; overflow-y: auto;">
  <table class="w-full border-collapse bg-[#31087B] text-left text-sm text-white">
    <thead class="bg-[#FA2FB5]">
      <tr>
        <th scope="col" class="px-6 py-4 font-medium text-white">Firstname</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">Surname</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">Role</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">Shift</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-[#FA2FB5] border-t border-[#FA2FB5]">
         <?php while($staff->fetch()) : ?>
            <tr class="hover:bg-[#31087B]">
                <td class="px-6 py-4"> <?= $firstName ?></td>
                <td class="px-6 py-4"><?= $surname ?></td>
                <td class="px-6 py-4"><?= $role ?></td>
                <td class="px-6 py-4"><span class="inline-flex items-center gap-1 rounded-full bg-[#FA2FB5] px-2 py-1 text-xs font-semibold text-white"><?= $shift ?></td>
         </tr>
        <?php endwhile ?>
    </tbody>
  </table>
</div>

<body style="background-color:#31087B">


<?php
include '../partials/footer.php';
?>