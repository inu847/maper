import 'dart:convert';
import 'package:http/http.dart' as http;
import 'materi.dart';
import 'constants.dart';

Future<List<Materi>> fetchMateriList() async {
  final response = await http.get(Uri.parse(BASE_URL + '/materi/lists'));
  if (response.statusCode == 200) {
    Iterable list = jsonDecode(response.body);
    return list.map((model) => Materi.fromJson(model)).toList();
  } else {
    throw Exception('Failed to load materi list');
  }
}
