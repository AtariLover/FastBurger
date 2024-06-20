<?php
include '../config/dbConfig.php';
include '../partials/header.php';
include '../partials/navigation.php';
?>

<body style="background-color:#31087B">

<header class="bg-[#FA2FB5] text-black py-8">
    <div class="container mx-auto flex items-left">
        <div class="w-full">
            <h1 class="text-5xl" style="color: White;">More Info</h1>
        </div>
        <div class="w-full"></div>
    </div>
</header>

<?php
$oid = $_GET['oid'];
// this query is very similar to the previous and may differ to yours depending on your setup
// the main difference is that there is a where clause in this one
// I have limited the qurey to only show the details with the order number that has been passed from the previous page
$moreInfo = $conn->prepare("SELECT
    o.order_id,
    o.order_date,
    c.customer_name,
    c.customer_tel,
    o.fk_payment_id,
    st.store_name,
    p.payment_type,
    s.staff_firstname,
    CASE 
        WHEN rm.regular_menu_meal_type IS NOT NULL THEN rm.regular_menu_meal_type
        WHEN sm.saver_menu_name IS NOT NULL THEN sm.saver_menu_name
        ELSE 'No Menu'
    END AS `Menu name`
FROM `order_table` o
LEFT JOIN customer c ON o.fk_customer_id = c.customer_id
LEFT JOIN menu_type m ON o.fk_menu_type_id = m.menu_type_id
LEFT JOIN payment p ON o.fk_payment_id = p.payment_id
LEFT JOIN staff s ON o.fk_staff_id = s.staff_id
LEFT JOIN regular_menu rm ON m.fk_regular_id = rm.regular_menu_id
LEFT JOIN saver_menu sm ON m.fk_saver_id = sm.saver_menu_id
LEFT JOIN store st ON o.fk_store_id = st.store_id
WHERE o.order_id = $oid;

");

$moreInfo->execute();
$moreInfo->store_result();
$moreInfo->bind_result($oid, $date, $customerName, $customerTel, $payment_id, $store, $payment_type, $staff, $menuName);
// On the orders page we called the fetch() function in a while statements as I wanted ot call all rows
// I now only want details of one order, so we use the fetch() function at this stage.
$moreInfo->fetch();

?>

<!-- component -->
<link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
<!-- I can now just call the variable created in the bind_result -->
<!-- the details that I have called is just some of the data that is required -->



<div class="overflow-hidden rounded-lg border border-[#31087B] shadow-md m-5 flex flex-row justify-center items-center">
  <table class="w-half border-collapse bg-[#31087B] text-left text-sm text-white">
    <thead class="bg-[#FA2FB5]">
      <tr>
        <th scope="col" class="px-6 py-4 font-medium text-white">Customer Name</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">Customer Telephone</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-[#FA2FB5] border-t border-[#FA2FB5]">
            <tr class="hover:bg-[#31087B]">
                <td class="px-6 py-4"> <?= $customerName ?></td>
                <td class="px-6 py-4"><span class="inline-flex items-center gap-1 rounded-full bg-[#FA2FB5] px-2 py-1 text-xs font-semibold text-white"><?= $customerTel ?></td>
         </tr>
    </tbody>
  </table>
</div>

<div class="overflow-hidden rounded-lg border border-[#31087B] shadow-md m-5 flex flex-row justify-center items-center">
  <table class="w-half border-collapse bg-[#31087B] text-left text-sm text-white">
    <thead class="bg-[#FA2FB5]">
      <tr>
        <th scope="col" class="px-6 py-4 font-medium text-white">Order Number</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">Order Date</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">Payment Type</th>
        <th scope="col" class="px-6 py-4 font-medium text-white">Shift</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-[#FA2FB5] border-t border-[#FA2FB5]">
            <tr class="hover:bg-[#31087B]">
                <td class="px-6 py-4"> <?= $oid ?></td>
                <td class="px-6 py-4"><?= $date ?></td>
                <td class="px-6 py-4">
                    <div class="flex gap-2"><span class="inline-flex items-center gap-1 text-white rounded-full <?php if($payment_id == 1) : ?> bg-green-500 <?php elseif($payment_id == 2) : ?>bg-blue-800 <?php else : ?> bg-red-400 <?php endif ?> px-2 py-1 text-xs font-semibold text-blue-600">
                        <?= $payment_type ?>
                      </span>
                    </div>
                </td>
                <td class="px-6 py-4"><span class="inline-flex items-center gap-1 rounded-full bg-[#FA2FB5] px-2 py-1 text-xs font-semibold text-white"><?= $menuName ?></td>
            </span>
          </div>
         </tr>
    </tbody>
  </table>
</div>

<div class="overflow-hidden rounded-lg border border-[#31087B] shadow-md m-5 flex flex-row justify-center items-center">
  <table class="w-half border-collapse bg-[#31087B] text-left text-sm text-white">
    <thead class="bg-[#FA2FB5]">
      <tr>
        <th scope="col" class="px-6 py-4 font-medium text-white">Store Name</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-[#FA2FB5] border-t border-[#FA2FB5]">
            <tr class="hover:bg-[#31087B]">
                <td class="px-6 py-4"> <?= $store ?></td>
         </tr>
    </tbody>
  </table>
</div>




<?php
include '../partials/footer.php';
?>