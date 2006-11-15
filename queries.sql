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