<!-- resources/views/question.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask a Question</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <a href="{{ route('request') }}" role="button" class="ml-2 text-xl text-sky-400">投稿ページへ</a>
</head>
<body>
    <h1 class="ml-2 text-4xl">Ask a question about HPLC analysis</h1>
    <form action="{{ route('search') }}" method="POST">
        @csrf
        <label class="ml-2" for="query">Enter your question:</label>
        <input class="ml-2 pl-2 w-1/3 border border-3-black" type="text" id="query" name="query" required>
        <button class="ml-2 border border-black rounded-md bg-indigo-500 p-2" type="submit">Submit</button>
    </form>
    <div class="ml-2">
        あなたが聞きたい質問をなんでも聞いて下さい。AIができる限り回答します。
        <br>
        例えばコードでも質問。(ex.G0592の分析データをください)。
        <br>
        <br>
        サンプル構造式がわかっている場合、<span class="text-xl">SMILESでの検索</span>がお勧めです。
        <div class="border border-1-black w-4/5"->
            ex.「MW:117.15でアミノ基を持つSMILScode:CCC(NC)C(=O)Oの分析をします。似たような化合物の分析条件を教えて下さい。」
            <br>
            英語 I am analyzing a compound with a molecular weight of 117.15 and an amino group with the SMILES code: CCC(NC)C(=O)O. Please provide the analysis conditions for similar compounds.
            <br>
            中国語 我正在分析一个分子量为117.15且含有氨基的化合物，SMILES代码为：CCC(NC)C(=O)O。请提供类似化合物的分析条件。
        
        </div>
                <br>
        <br>
        <div>
            理想は<span class="text-xl">上司や仲間に相談する際の<span class="text-rose-500">内容</span></span>です。
        </div>
        あなたが分析したい化合物の特徴、分子量、官能基、化合物のキーワードなども加えると尚良し！


    </div>
</body>
</html>
