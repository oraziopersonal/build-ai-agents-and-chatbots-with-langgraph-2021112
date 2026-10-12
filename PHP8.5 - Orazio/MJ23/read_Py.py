import csv


def read_csv(file_path):
    with open(file_path, newline="", encoding="utf-8") as csv_file:
        return list(csv.DictReader(csv_file))


def write_csv(file_path, rows, fieldnames=None):
    if fieldnames is None and rows:
        fieldnames = list(rows[0].keys())

    with open(file_path, "w", newline="", encoding="utf-8") as csv_file:
        writer = csv.DictWriter(csv_file, fieldnames=fieldnames)
        if fieldnames is not None:
            writer.writeheader()
        writer.writerows(rows)


if __name__ == "__main__":
    data = [
        {"name": "Alice", "age": "30"},
        {"name": "Bob", "age": "25"},
    ]

    write_csv("people.csv", data)
    print(read_csv("people.csv"))
