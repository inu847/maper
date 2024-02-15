import 'package:flutter/material.dart';
import 'package:maper_apps/detail_materi.dart';
import 'api_service.dart';
import 'materi.dart';

class ListMateri extends StatelessWidget {
  const ListMateri({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'API Demo',
      home: Scaffold(
        appBar: AppBar(
          title: const Text('API Demo'),
        ),
        body: FutureBuilder<List<Materi>>(
          future: fetchMateriList(), // Changed to fetchMateriList()
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.waiting) {
              return const Center(child: CircularProgressIndicator());
            } else if (snapshot.hasError) {
              return Center(child: Text('Error: ${snapshot.error}'));
            } else if (!snapshot.hasData || snapshot.data!.isEmpty) {
              return const Center(child: Text('No data available'));
            } else {
              return ListView.builder(
                itemCount: snapshot.data!.length,
                itemBuilder: (context, index) {
                  final data = snapshot.data![index];
                  return Container(
                    // BORDER
                    decoration: BoxDecoration(
                      border: Border.all(),
                      borderRadius: BorderRadius.circular(8.0),
                      color: Colors.grey.shade300,
                    ),

                    // MARGIN AND PADDING
                    margin: const EdgeInsets.all(8.0),
                    padding: const EdgeInsets.all(8.0),

                    // CONTENT
                    child: ListTile(
                        title: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              mainAxisSize: MainAxisSize.min,
                              mainAxisAlignment: MainAxisAlignment.start,
                              verticalDirection: VerticalDirection.down,
                              textDirection: TextDirection.ltr,
                              children: [
                                Text(
                                  data.title,
                                  style: const TextStyle(
                                    fontWeight: FontWeight.bold
                                  ),
                                ),
                              ]
                        ),
                        subtitle: Text(data.created_at),
                        onTap: () {
                            Navigator.of(context).push(
                                MaterialPageRoute(
                                builder: (context) => DetailMateri(data),
                                ),
                            );
                        },
                    ),
                  );
                },
              );
            }
          },
        ),
      ),
    );
  }
}