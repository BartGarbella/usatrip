SELECT 
    SUM(IF(`Currency` LIKE 'USD',
        Round( ((Sum * `Share`) * 0.87), 2)    ,   Round((Sum * `Share`),2))    ) AS 'ToBalance'
FROM
    usa_trip.costs
WHERE
    Balanced != 1 AND PaidBy LIKE 'Bart';





