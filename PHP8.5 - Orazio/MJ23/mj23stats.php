<?php
declare(strict_types=1);

/** Export Michael Jordan's NBA regular-season per-game stats to CSV. */

$seasons = [
	['1984-85', 'CHI', 82, 28.2, 6.5, 5.9],
	['1985-86', 'CHI', 18, 22.7, 3.6, 2.9],
	['1986-87', 'CHI', 82, 37.1, 5.2, 4.6],
	['1987-88', 'CHI', 82, 35.0, 5.5, 5.9],
	['1988-89', 'CHI', 81, 32.5, 8.0, 8.0],
	['1989-90', 'CHI', 82, 33.6, 6.9, 6.3],
	['1990-91', 'CHI', 82, 31.5, 6.0, 5.5],
	['1991-92', 'CHI', 80, 30.1, 6.4, 6.1],
	['1992-93', 'CHI', 78, 32.6, 6.7, 5.5],
	['1994-95', 'CHI', 17, 26.9, 6.9, 5.3],
	['1995-96', 'CHI', 82, 30.4, 6.6, 4.3],
	['1996-97', 'CHI', 82, 29.6, 5.9, 4.3],
	['1997-98', 'CHI', 82, 28.7, 5.8, 3.5],
	['2001-02', 'WAS', 60, 22.9, 5.7, 5.2],
	['2002-03', 'WAS', 82, 20.0, 6.1, 3.8],
];

$outputPath = $argv[1] ?? __DIR__ . '/mj23stats.csv';
$csv = fopen($outputPath, 'wb');

if ($csv === false) {
	fwrite(STDERR, "Cannot write CSV file: {$outputPath}\n");
	exit(1);
}

fputcsv($csv, ['season', 'team', 'games', 'points_per_game', 'rebounds_per_game', 'assists_per_game']);
foreach ($seasons as $season) {
	fputcsv($csv, $season);
}

fclose($csv);
fwrite(STDOUT, sprintf("Exported %d seasons to %s\n", count($seasons), $outputPath));
