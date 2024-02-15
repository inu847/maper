import 'package:flutter/material.dart';
import 'package:chewie/chewie.dart';
import 'package:video_player/video_player.dart';
import 'materi.dart';
import 'package:flutter_widget_from_html/flutter_widget_from_html.dart';

class DetailMateri extends StatefulWidget {
  final Materi materi;

  const DetailMateri(this.materi, {super.key});

  @override
  // ignore: library_private_types_in_public_api
  _DetailMateriState createState() => _DetailMateriState();
}

class _DetailMateriState extends State<DetailMateri> {
  late VideoPlayerController _videoPlayerController;
  late ChewieController _chewieController;

  @override
  void initState() {
    super.initState();
    _videoPlayerController = VideoPlayerController.network(widget.materi.file_path);
    _chewieController = ChewieController(
      videoPlayerController: _videoPlayerController,
      autoPlay: true,
      looping: true,
    );
  }

  @override
  void dispose() {
    _videoPlayerController.dispose();
    _chewieController.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Detail Materi'),
      ),
      body: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Chewie(
              controller: _chewieController,
            ),
            Padding(
              padding: const EdgeInsets.all(16.0),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    widget.materi.title,
                    style: const TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 20.0,
                    ),
                  ),
                  const SizedBox(height: 8.0),
                  // ADD SingleChildScrollView
                  SingleChildScrollView(
                    child: Padding(padding: const EdgeInsets.all(16.0), child: HtmlWidget(widget.materi.description)),
                  ),
                  // const SizedBox(height: 8.0),
                  // Text(
                  //   'Type: ${widget.materi.type}',
                  //   style: const TextStyle(fontSize: 16.0),
                  // ),
                  const SizedBox(height: 8.0),
                  Text(
                    'Created At: ${widget.materi.created_at}',
                    style: const TextStyle(fontSize: 16.0),
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
