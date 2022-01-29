-- task 1
INSERT INTO clients (
        clientFirstname,
        clientLastname,
        clientEmail,
        clientPassword,
        comment
    )
VALUES (
        "Tony",
        "Stark",
        "tony@starkent.com",
        "Iam1ronM@n",
        "I am the real Ironman"
    );
-- task 2
UPDATE clients
SET clientLevel = "3"
where clientId = 1;
-- task 3
UPDATE inventory
SET invMake = replace(invMake, "GM", "spacious"),
    invModel = replace(invModel, "Hummer", "interior")
WHERE invId = 12;
-- task 4
SELECT invModel,
    classificationName
FROM inventory
    INNER JOIN carclassification ON inventory.classificationId = carclassification.classificationId
WHERE carclassification.classificationName = "SUV";
-- task 5
DELETE FROM inventory
WHERE invId = 1;
-- Task 6
UPDATE inventory
SET invImage = concat("/phpmotors", invImage),
    invThumbnail = concat("/phpmotors", invThumbnail);