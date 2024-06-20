<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';
?>

<body style="background-color:#31087B">

<header class="bg-[#FA2FB5] text-black py-6">
    <div class="container mx-auto flex items-left">
        <div class="w-1">
            <h1 class="text-5xl" style="color: White;">Orders</h1>
        </div>
        <div class="w-1"></div>
    </div>
</header>

<?php

$orders = $conn->prepare("SELECT
o.order_id,
o.order_date,
o.fk_payment_id,
c.customer_name,
p.payment_type
 FROM `order_table` o
 INNER JOIN customer c ON o.fk_customer_id = c.customer_id
 INNER JOIN menu_type m ON o.fk_menu_type_id = m.menu_type_id
 INNER JOIN payment p ON o.fk_payment_id = p.payment_id
 ORDER BY o.order_date DESC
");

$orders->execute();
$orders->store_result();
$orders->bind_result($oid, $date, $payment_id, $customer, $payment_type);
?>

<div class="overflow-hidden rounded-lg border border-[#31087B] shadow-md m-5" style="max-height: 450px; overflow-y: auto;">
  <table class="w-full border-collapse bg-[#31087B] text-left text-sm text-white">
    <thead class="bg-[#FA2FB5]">
      <tr>
        <th scope="col" class="px-6 py-4 font-medium text-white">Order Id</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">Name</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">Order Date</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">Menu</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">Cash / Card</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">View order details</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-[#FA2FB5] border-t border-[#FA2FB5]">
      <!-- this section returns the data -->
      <!-- as I wanted to return all orders I have use a while loop and have fetched the data -->
      <!-- the wihile loop should be round the whole element that I want to repeat for every row of data -->
      <!-- in this example it it the <tr> element (table row) -->
    <?php while($orders->fetch()) : ?>
      <tr class="hover:bg-[#31087B]">
        <!-- each of the variable created above in the bind_result can be added here -->
        <!-- to return the data we use <?= $variableName ?> this returns the data to the frontend -->
        <td class="px-6 py-4"><?= $oid ?></td>
        <td class="px-6 py-4"> <?= $customer ?></td>
        <td class="px-6 py-4"><span class="inline-flex items-center gap-1 rounded-full bg-[#FA2FB5] px-2 py-1 text-xs font-semibold text-white">
            <?= $date ?>
          </span>
        </td>
        <td class="px-6 py-4">Lunch</td>
        <td class="px-6 py-4">
          <div class="flex gap-2"><span class="inline-flex items-center gap-1 text-white rounded-full <?php if($payment_id == 1) : ?> bg-green-500 <?php elseif($payment_id == 2) : ?>bg-blue-800 <?php else : ?> bg-red-400 <?php endif ?> px-2 py-1 text-xs font-semibold text-blue-600">
              <?= $payment_type ?>
            </span>
          </div>
        </td>
       
          <!-- as I want to view the details of each order, I want to pass a parameter $oid -->
          <!-- $oid is a variable name for the order id, as it is being passed as a parameter
                I can call it on the orderDetails page
                orderDetails has been setup slightly different on the .htaccess file
          -->
        <td onclick="window.location.href='moreInfo/<?= $oid ?>'"><i class="fa-solid fa-eye"></i></td>

  
      </tr>
      <?php endwhile ?>
    </tbody>
  </table>
</div>




















<?php
include '../partials/footer.php';
?>