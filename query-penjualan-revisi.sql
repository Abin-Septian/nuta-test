SELECT
  (SELECT
    `CategoryName`
  FROM
    `mastercategory` b
  WHERE a.`PerusahaanNo` = b.`PerusahaanNo`
    AND a.`DeviceID` = b.`DeviceID`
    AND a.`CategoryDeviceNo` = b.`DeviceNo`
    AND a.`CategoryID` = b.`CategoryID`) AS CategoryName,
  a.`ItemName`,
  (SELECT
    COALESCE(SUM(`Quantity`), 0)
  FROM
    `saleitemdetail` c
  WHERE c.`PerusahaanNo` = a.`PerusahaanNo`
    AND c.`DeviceID` = a.`DeviceID`
    AND c.`ItemDeviceNo` = a.`DeviceNo`
    AND c.`ItemID` = a.`ItemID`
    AND c.`TransactionID` =
    (SELECT
      d.`TransactionID`
    FROM
      `sale` d
    WHERE d.`PerusahaanNo` = c.`PerusahaanNo`
      AND d.`DeviceID` = c.`DeviceID`
      AND d.`DeviceNo` = c.`TransactionDeviceNo`
      AND d.`TransactionID` = c.`TransactionID`
      AND d.`SaleDate` = '2017-05-11')) AS Qty,
  (SELECT
    `Qty` * `SellPrice`) AS SubTotal
FROM
  `masteritem` a
WHERE a.PerusahaanNo = 639
  AND a.DeviceID = 1356