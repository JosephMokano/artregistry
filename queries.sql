SELECT resource.resource_name,
ROUND(SUM(artefact.artefact_bonus), 3) AS aa_bonus,
COUNT(player_artefact.artefact_id) AS aa_count
FROM artefact, player_artefact, resource
WHERE player_artefact.artefact_id = artefact.artefact_id
AND resource.resource_id=artefact.resource_id
GROUP BY resource.resource_name





SELECT resource.resource_name,
ROUND(SUM(artefact.artefact_bonus), 3) AS aa_bonus_1m,
COUNT(player_artefact.artefact_id) AS aa_count_1m
FROM artefact, player_artefact, resource
WHERE player_artefact.artefact_id = artefact.artefact_id
AND resource.resource_id=artefact.resource_id
AND player_artefact.player_artefact_date<=UNIX_TIMESTAMP(CURRENT_DATE - INTERVAL 1 MONTH)
GROUP BY resource.resource_name





SELECT ROUND(SUM(artefact.artefact_bonus), 3) AS aa_bonus,
COUNT(player_artefact.artefact_id) AS aa_count
FROM artefact, player_artefact
WHERE player_artefact.artefact_id = artefact.artefact_id
GROUP BY artefact.resource_id



SELECT resource.resource_name, tbl1.*, tbl2.aa_bonus_1m, tbl2.aa_count_1m, tbl3.aa_bonus_3m, tbl3.aa_count_3m FROM
(SELECT artefact.resource_id, ROUND(SUM(artefact.artefact_bonus), 3) AS aa_bonus,
COUNT(player_artefact.artefact_id) AS aa_count
FROM artefact, player_artefact
WHERE player_artefact.artefact_id = artefact.artefact_id
GROUP BY artefact.resource_id) AS tbl1 LEFT JOIN
(SELECT artefact.resource_id, ROUND(SUM(artefact.artefact_bonus), 3) AS aa_bonus_1m,
COUNT(player_artefact.artefact_id) AS aa_count_1m
FROM artefact, player_artefact
WHERE player_artefact.artefact_id = artefact.artefact_id
AND player_artefact.player_artefact_date<=UNIX_TIMESTAMP(CURRENT_DATE - INTERVAL 1 MONTH)
GROUP BY artefact.resource_id) AS tbl2
ON tbl1.resource_id = tbl2.resource_id
LEFT JOIN
(SELECT artefact.resource_id, ROUND(SUM(artefact.artefact_bonus), 3) AS aa_bonus_3m,
COUNT(player_artefact.artefact_id) AS aa_count_3m
FROM artefact, player_artefact
WHERE player_artefact.artefact_id = artefact.artefact_id
AND player_artefact.player_artefact_date<=UNIX_TIMESTAMP(CURRENT_DATE - INTERVAL 3 MONTH)
GROUP BY artefact.resource_id) AS tbl3
ON tbl1.resource_id = tbl3.resource_id
INNER JOIN resource ON tbl1.resource_id = resource.resource_id
ORDER BY tbl1.resource_id