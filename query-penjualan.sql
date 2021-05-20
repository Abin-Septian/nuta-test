SELECT
  `CategoryName`,
  `ItemName`,
  COALESCE (
    (SELECT
      SUM(`Quantity`)
    FROM
      `saleitemdetail` AS `billDetail`
    WHERE `billDetail`.`ItemID` = `item`.`ItemID`
      AND `billDetail`.`PerusahaanNo` = `categoty`.PerusahaanNo
      AND `billDetail`.`DeviceID` = `categoty`.`DeviceID`
      AND `billDetail`.`TransactionID` = `bill`.`TransactionID`),
    0
  ) AS qty,
  COALESCE ((SELECT
    `SellPrice` * `Qty`),0) AS SubTotal
FROM
  `sale` AS bill
  LEFT JOIN `mastercategory` AS categoty
    ON `categoty`.`PerusahaanNo` = `bill`.`PerusahaanNo`
  LEFT JOIN `masteritem` AS `item`
    ON `categoty`.`PerusahaanNo` = `item`.`PerusahaanNo`
WHERE bill.PerusahaanNo = 639
  AND bill.`DeviceID` = 1356
  AND `SaleDate` = '2017-05-11'
  LIMIT 1000
  