<?php
// include_once '../db/config.php';
// $u_id = 1;
$purchased_plan_data_set = array(
    array(
        array(
            "user_id" => $u_id,
            "plans_id" => 3,
            "purchased_date" => '2022-01-01',
            "expired" => 1,
            "expired_date" => '2022-03-26'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 4,
            "purchased_date" => '2022-03-26',
            "expired" => 1,
            "expired_date" => '2022-06-18'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 10,
            "purchased_date" => '2022-06-20',
            "expired" => 1,
            "expired_date" => '2022-07-18'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 17,
            "purchased_date" => '2022-07-21',
            "expired" => 1,
            "expired_date" => '2022-08-18'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 1,
            "purchased_date" => '2022-08-27',
            "expired" => 0,
            "expired_date" => '2023-07-30'
        )
    ),
    array(
        array(
            "user_id" => $u_id,
            "plans_id" => 1,
            "purchased_date" => '2021-07-08',
            "expired" => 0,
            "expired_date" => '2022-07-08'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 3,
            "purchased_date" => '2022-07-27',
            "expired" => 0,
            "expired_date" => '2022-10-19'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 7,
            "purchased_date" => '2022-10-20',
            "expired" => 0,
            "expired_date" => '2023-01-12'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 1,
            "purchased_date" => '2023-01-12',
            "expired" => 0,
            "expired_date" => '2024-04-06'
        ),
    ),
    array(
        array(
            "user_id" => $u_id,
            "plans_id" => 6,
            "purchased_date" => '2022-04-01',
            "expired" => 1,
            "expired_date" => '2022-06-24'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 8,
            "purchased_date" => '2022-06-24',
            "expired" => 1,
            "expired_date" => '2022-08-19'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 6,
            "purchased_date" => '2022-08-20',
            "expired" => 1,
            "expired_date" => '2022-11-12'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 4,
            "purchased_date" => '2022-11-12',
            "expired" => 1,
            "expired_date" => '2023-02-04'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 3,
            "purchased_date" => '2023-02-04',
            "expired" => 1,
            "expired_date" => '2023-04-29'
        ),
        array(
            "user_id" => $u_id,
            "plans_id" => 3,
            "purchased_date" => '2023-05-05',
            "expired" => 0,
            "expired_date" => '2023-04-28'
        )
    )
);

// include_once './inc/planDataSet.php';
// $data_set = $purchased_paln_data_set[rand(0, 2)];
// function insertPlanData(){
//                     $i = 0;
//                     foreach ($GLOBALS['data_set'] as $plans){
//                         $insert_plan = "INSERT INTO purchased_plans(`user_id`, `plans_id`, `purchased_date`, `expired`, `expired_date`) VALUES(:user_id,:plans_id,:purchased_date,:expired,:expired_date)";
//                         echo $plans[$i]['plans_id'];
//                         $prepared_plan_query = $GLOBALS['pdo']->prepare($insert_plan);
//                         $prepared_plan_query->bindParam(':user_id', $GLOBALS['u_id']);
//                         $prepared_plan_query->bindParam(':plans_id', $plans['plans_id']);
//                         $prepared_plan_query->bindParam(':purchased_date', $plans['purchased_date']);
//                         $prepared_plan_query->bindParam(':expired', $plans['expired']);
//                         $prepared_plan_query->bindParam(':expired_Date', $plans['expired_Date']);
//                         $inserted = $prepared_plan_query->execute();
//                     }
//                     return $inserted;
//                 }

//             $inserted_plans = insertPlanData();
// var_dump($inserted_plans);
?>