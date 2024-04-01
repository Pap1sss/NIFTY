<?php

//submit_rating.php

$connect = new PDO("mysql:host=localhost;dbname=website", 'NIFTYSHOES', 'pa$$word1');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["rating_data"])) {
	$user_name = $_POST["user_name"];
	$product_id = $_POST["product_id"];



	// Check if the user has already submitted a review
	$query = "
	SELECT * FROM review_table
	WHERE user_name = :user_name AND product_id = :product_id
	";

	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':user_name' => $user_name,
			':product_id' => $product_id
		)
	);

	if ($statement->rowCount() > 0) {
		// User has already submitted a review
		echo "You have already given a review.";
	} else {
		$data = array(
			':user_name' => $_POST["user_name"],
			':user_rating' => $_POST["rating_data"],
			':user_review' => $_POST["user_review"],
			':product_id' => $_POST["product_id"],
			':datetime' => time()
		);

		$query = "
	INSERT INTO review_table 
	(user_name, user_rating, user_review, datetime, product_id) 
	VALUES (:user_name, :user_rating, :user_review, :datetime, :product_id)
	";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		echo "Your Review & Rating Successfully Submitted";

	}
}

if (isset($_POST["action"])) {
	$product_id = $_POST["product_id"];

	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM review_table WHERE product_id = :product_id 
	ORDER BY review_id DESC
	";

	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':product_id' => $product_id
		)
	);

	$result = $statement->fetchAll();

	foreach ($result as $row) {
		$review_content[] = array(
			'user_name' => $row["user_name"],
			'user_review' => $row["user_review"],
			'rating' => $row["user_rating"],
			'datetime' => date('l jS, F Y h:i:s A', $row["datetime"])
		);

		if ($row["user_rating"] == '5') {
			$five_star_review++;
		}

		if ($row["user_rating"] == '4') {
			$four_star_review++;
		}

		if ($row["user_rating"] == '3') {
			$three_star_review++;
		}

		if ($row["user_rating"] == '2') {
			$two_star_review++;
		}

		if ($row["user_rating"] == '1') {
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating' => number_format($average_rating, 1),
		'total_review' => $total_review,
		'five_star_review' => $five_star_review,
		'four_star_review' => $four_star_review,
		'three_star_review' => $three_star_review,
		'two_star_review' => $two_star_review,
		'one_star_review' => $one_star_review,
		'review_data' => $review_content
	);

	echo json_encode($output);

}

?>