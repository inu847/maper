import 'constants.dart';

class Materi {
  final int id;
  final String title;
  final String description;
  final int type;
  // ignore: non_constant_identifier_names
  final String created_at;
  // ignore: non_constant_identifier_names
  final String file_path;

  Materi({
    required this.id,
    required this.title,
    required this.description,
    required this.type,
    // ignore: non_constant_identifier_names
    required this.created_at,
    // ignore: non_constant_identifier_names
    required this.file_path,
  });

  factory Materi.fromJson(Map<String, dynamic> json) {
    return Materi(
      id: json['id'],
      title: json['title'],
      description: json['description'],
      type: int.parse(json['type']),
      created_at: json['created_at'],
      file_path: URL +'storage/' + json['file_path'],
    );
  }
}
