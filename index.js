const http = require("http");

const server = http.createServer((req, res) => {
  if (req.url === "/" || req.url === "/xhr") {
    const xhr = req.url === "/xhr";
    res.writeHead(200, {
      "Content-Type": xhr ? "text/plain" : "text/event-stream",
      "Cache-Control": "no-cache",
      "Transfer-Encoding": "chunked", // enable flushing
      "Access-Control-Allow-Origin": "*",
    });

    // start up, sometimes needed in some browsers
    res.write(" ".repeat(1024));
    if (!xhr) {
      res.write("\n\n");
    }

    const txt =
      "The zebra jumps quickly over a fence, vexed by a lazy ox. Eden tries to alter soft stone near it. Tall giants often need to rest, and open roads invite no pause. Some long lines appear there. In bright cold night, stars drift, and people watch them. A few near doors step out. Much light finds land slowly, while men feel deep quiet. Words run in ways, forward yet true. Look ahead, and things form still, yet dreams stay hidden. Down the path, close skies come, forming hard arcs. High above, quiet kites drift, fast on pure wind, yanking joints.";
    const words = txt.split(" ");
    let to = 0;
    for (let word of words) {
      to += Math.floor(Math.random() * 200) + 80;
      setTimeout(() => {
        if (!xhr) {
          res.write(`data: ${word} \n\n`);
        } else {
          res.write(`${word} `);
        }
      }, to);
    }

    if (!xhr) {
      setTimeout(() => {
        res.write("event: done\n");
        res.write("data:\n\n");
        res.end();
      }, to + 1000);
    }

    req.on("close", () => {
      res.end();
    });
  } else {
    res.writeHead(404);
    res.end("Not Found\n");
  }
});

const port = 8080;
server.listen(port, () => {
  console.log(`Server started on port ${port}`);
});
