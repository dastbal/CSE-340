<?php
// "Reviews PHP Motors Model".


function insertReview($reviewText, $invId, $clientId)
{
    $db = phpmotorsConnect();
    $sql = 'INSERT INTO reviews (reviewText, invId, clientId) VALUES (:reviewText, :invId, :clientId)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
function getReviewsByInvId($invId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT r.reviewId, r.reviewText, r.reviewDate, r.invId, r.clientId, c.clientFirstname, c.clientLastname  FROM reviews r JOIN inventory i ON r.invId = i.invId JOIN clients c ON r.clientId = c.clientId WHERE r.invId = :invId ';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}
function getReviewsByClientId($clientId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT r.reviewId, r.reviewText , r.reviewDate, r.invId, r.clientId, c.clientFirstname, c.clientLastname, i.invMake, i.invModel FROM reviews r JOIN inventory i ON r.invId = i.invId JOIN clients c ON r.clientId = c.clientId WHERE r.clientId = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}
function getReviewByReviewId($reviewId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT r.reviewId, r.reviewText, r.reviewDate, r.invId, r.clientId, c.clientFirstname, c.clientLastname, i.invMake, i.invModel   FROM reviews r JOIN inventory i ON r.invId = i.invId JOIN clients c ON r.clientId = c.clientId WHERE r.reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $review = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $review;
}
function updateReviewByReviewId($reviewText, $reviewId)
{
    $db = phpmotorsConnect();
    $sql = 'UPDATE reviews SET reviewText = :reviewText WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
function deleteReviewByReviewId($reviewId)
{
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
