<?php require_once __DIR__ . '/../helpers/index.php'; ?>
<!DOCTYPE html>
<html
  prefix="og:http://ogp.me/ns#"
  lang="ja"
>

<head>
  <?php echo $meta->base(); ?>
  <?php echo $meta->title('ページ2'); ?>
  <?php echo $meta->description('ディスクリプション2'); ?>
  <?php echo $meta->ogp('home.jpg'); ?>
  <?php echo vite('home.js'); ?>
</head>

<body
  itemscope
  itemtype="http://schema.org/WebPage"
>
  <div id="app">

    <the-header></the-header>

    <main>
      <the-main-header
        title="HTML5 Test Page"
        sub="CSSでスタイリングするための、一般的なHTML要素のテストページです。"
      ></the-main-header>

      <div>
        <!-- thanks : https://github.com/cbracco/html5-test-page -->
        <p>Made by <a href="http://twitter.com/cbracco">@cbracco</a>. Code on <a
            href="http://github.com/cbracco/html5-test-page"
          >GitHub</a>.</p>
      </div>

      <section>
        <nav>
          <ul>
            <li>
              <h3><a
                  href="#"
                  v-scroll-to="'#text-elements'"
                >text elements</a></h3>
              <ul>
                <li><a
                    href="#"
                    v-scroll-to="'#text__headings'"
                  >Headings（見出し）</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#text__paragraphs'"
                  >Paragraphs（段落）</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#text__blockquotes'"
                  >Blockquotes（ブロック引用）</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#text__lists'"
                  >Lists（リスト）</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#text__hr'"
                  >Horizontal rules（水平ルール）</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#text__tables'"
                  >Tabular data（表データ）</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#text__code'"
                  >Code（コード）</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#text__inline'"
                  >Inline elements（インライン要素）</a></li>
            </li>
          </ul>
          <ul>
            <li>
              <h3><a
                  href="#"
                  v-scroll-to="'#embedded-elements'"
                >Embedded elements</a></h3>
              <ul>
                <li><a
                    href="#"
                    v-scroll-to="'#embedded__images'"
                  >Images（画像）</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#embedded__audio'"
                  >Audio（オーディオ）</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#embedded__video'"
                  >Video（動画）</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#embedded__iframe'"
                  >IFrames（iFrame）</a></li>
              </ul>
            </li>
          </ul>
          <ul>
            <li>
              <h3><a
                  href="#"
                  v-scroll-to="'#forms-elements'"
                >Form elements</a></h3>
              <ul>
                <li><a
                    href="#"
                    v-scroll-to="'#forms__input'"
                  >Input fields</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#forms__select'"
                  >Select menus</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#forms__checkbox'"
                  >Checkboxes</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#forms__radio'"
                  >Radio buttons</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#forms__textareas'"
                  >Textareas</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#forms__html5'"
                  >HTML5 inputs</a></li>
                <li><a
                    href="#"
                    v-scroll-to="'#forms__action'"
                  >Action buttons</a></li>
              </ul>
            </li>
          </ul>
        </nav>

        <h2 id="text-elements">text elements</h2>

        <article id="text__headings">
          <h2>Headings（見出し）</h2>
          <h1>Heading 1（見出し1）</h1>
          <h2>Heading 2（見出し2）</h2>
          <h3>Heading 3（見出し3）</h3>
          <h4>Heading 4（見出し4）</h4>
          <h5>Heading 5（見出し5）</h5>
          <h6>Heading 6（見出し6）</h6>
        </article>

        <article id="text__paragraphs">
          <h2>Paragraphs（段落）</h2>
          <p>段落（ギリシャ語の段落の "横に書く"または
            "横に書いた"）は、特定のポイントやアイデアを扱う書面による自己完結型の単位です。段落は、1つ以上の文から構成されます。パラグラフは、言語の構文では必須ではありませんが、通常、長い散文を整理するために使用される、正式な文章の一部です。
          </p>
          <p>A paragraph (from the Greek paragraphos, “to write beside” or “written beside”) is a self-contained unit
            of a discourse in writing dealing with a particular point or idea. A paragraph consists of one or more
            sentences. Though not required by the syntax of any language, paragraphs are usually an expected part of
            formal writing, used to organize longer prose.</p>
        </article>

        <article id="text__blockquotes">
          <h2>Blockquotes</h2>
          <div>
            <blockquote>
              <p>ブロック引用（長い引用や抽出とも呼ばれます）は、書かれた文書の引用です。本文は段落やテキストのブロックとして設定されています。</p>
              <p>A block quotation (also known as a long quotation or extract) is a quotation in a written document,
                that is set off from the main text as a paragraph, or block of text.</p>
              <p>通常、インデントと異なる書体または小さいサイズの引用を使用して視覚的に区別されます。それは引用を含んでも含まなくてもよく、引用を掲載する場合は一番下に置かれます。</p>
              <p>It is typically distinguished visually using indentation and a different typeface or smaller size
                quotation. It may or may not include a citation, usually placed at the bottom.</p>
              <cite>
                <a href="#">Said no one, ever.誰も言わなかった。</a>
              </cite>
            </blockquote>
          </div>
        </article>

        <article id="text__lists">
          <h2>Lists（リスト）</h2>
          <div>
            <h3>Definition list（定義リスト：dl）</h3>
            <dl>
              <dt>Definition List Title（定義リストのタイトル）</dt>
              <dd>This is a definition list division.（これは定義リストの分割です。）</dd>
            </dl>
            <h3>Ordered List（オーダーリスト:ol）</h3>
            <ol>
              <li>List Item 1（リスト項目）</li>
              <li>List Item 2（リスト項目）</li>
              <li>List Item 3（リスト項目）
                <ol>
                  <li>List Item 1（リスト項目）</li>
                  <li>List Item 2（リスト項目）</li>
                  <li>List Item 3（リスト項目）</li>
                </ol>
              </li>
            </ol>
            <h3>Unordered List（順序付けされていないリスト:ul）</h3>
            <ul>
              <li>List Item 1（リスト項目）</li>
              <li>List Item 2（リスト項目）</li>
              <li>List Item 3（リスト項目）
                <ul>
                  <li>List Item 1（リスト項目）</li>
                  <li>List Item 2（リスト項目）</li>
                  <li>List Item 3（リスト項目）</li>
                </ul>
              </li>
            </ul>
          </div>
        </article>

        <article id="text__hr">
          <h2>Horizontal rules（水平ルール）</h2>
          <div>
            <hr>
          </div>
        </article>

        <article id="text__tables">
          <h2>Tabular data（表形式のデータ）</h2>
          <table class="u-table has-data-label">
            <caption>テーブルサンプル</caption>
            <colgroup>
              <col
                span="1"
                style="width:30%;"
              >
              <col
                span="1"
                style="width:10%;"
              >
              <col
                span="1"
                style="width:10%;"
              >
              <col
                span="1"
                style="width:10%;"
              >
              <col
                span="1"
                style="width:auto;"
              >
            </colgroup>
            <thead>
              <tr>
                <th>key</th>
                <th>key</th>
                <th>key</th>
                <th>key</th>
                <th>key</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-label="key">長いvalueです。ダミーダミーダミーダミーダミーダミーダミーダミーダミーダミーダミー</td>
                <td data-label="長いkeyです。ダミーダミーダミーダミー。">value</td>
                <td data-label="key">value</td>
                <td data-label="key">value</td>
                <td data-label="key">value</td>
              </tr>
              <tr>
                <td data-label="key">value</td>
                <td data-label="key">value</td>
                <td data-label="key">value</td>
                <td data-label="key">value</td>
                <td data-label="key">value</td>
              </tr>
              <tr>
                <td data-label="key">value</td>
                <td data-label="key">value</td>
                <td data-label="key">value</td>
                <td data-label="key">value</td>
                <td data-label="key">value</td>
              </tr>
            </tbody>
          </table>
        </article>

        <article id="text__code">
          <h2>Code（コード）</h2>
          <div>
            <p>
              Keyboard input（キーボード入力 kbd）:<kbd>Cmd</kbd>
            </p>
            <p>
              Inline code（インラインコード coad）:<code>&lt;div&gt;code&lt;/div&gt;</code>
            </p>
            <p>
              Sample output(サンプル出力 samp):
              <samp>これは、コンピュータプログラムからのサンプル出力です。</samp>
            </p>
            <p>Pre-formatted text（pre）
            <pre>
P R E F O R M A T T E D T E X T
! " # $ % &amp; ' ( ) * + , - . /
0 1 2 3 4 5 6 7 8 9 : ; &lt; = &gt; ?
@ A B C D E F G H I J K L M N O
P Q R S T U V W X Y Z [ \ ] ^ _
` a b c d e f g h i j k l m n o
p q r s t u v w x y z { | } ~
</pre>
            </p>
          </div>
        </article>

        <article id="text__inline">
          <h2>Inline elements（インライン要素）</h2>
          <div>
            <p>a :
              <a href="#">これはテキストリンク</a>です。
            </p>
            <p>strong :
              <strong>strongは、強い重要性を示すために使用されます。</strong>
            </p>
            <p>em :
              <em>このテキストは重点（em）を置いています。This text has added emphasis.</em>
            </p>
            <p>b :
              <b>b要素は、特別な重要性なしに</b>通常のテキストから文体異なるテキストです。
            </p>
            <p>i :
              <i>i要素は声や心の中で思ったことなど、</i>他と区別したいテキストを表す際に使用します。
            </p>
            <p>del :
              <del>削除された部分である</del>ことを示す際に使用します。
            </p>
            <p>ins :
              <ins>挿入された部分である</ins>ことを示す際に使用します。
            </p>
            <p>s :
              <s>すでに正確ではなくなった・関係なくなった内容</s>を表す際に使用します。
            </p>
            <p>sup : superscriptの略で、上付き文字を表す際に使用します。
              <sup>&#174;</sup>/ m
              <sup>2</sup>
            </p>
            <p>sub : subscriptの略で、下付き文字を表す際に使用します。 H
              <sub>2</sub>O.
            </p>
            <p>small :
              <small>免責・警告・法的規制・著作権・ライセンス要件などの注釈や細目を表す際に使用します。 </small>
            </p>
            <p>abbr : 略語や頭字語であることを表す際に使用します。
              <abbr title="HyperText Markup Language">HTML</abbr>
            </p>
            <p>q : 他の情報源からの引用句・引用文であることを表す際に使用します。
              <q cite="https://developer.mozilla.org/en-US/docs/HTML/Element/q">This text is a short inline
                quotation.</q>
            </p>
          </div>
        </article>

        <h2 id="embedded-elements">Embedded elements</h2>

        <article id="embedded__images">
          <h2>Images(画像)</h2>
          <div>
            <h3>
              <code>&lt;figure&gt;</code>タグ未利用です。
            </h3>
            <p>
              <img
                src="img/logo.png"
                alt="Image alt text"
              >
            </p>
            <h3>
              <code>&lt;figure&gt;</code>タグのみを利用します。
            </h3>
            <figure>
              <img
                src="img/logo.png"
                alt="Image alt text"
              >
            </figure>
            <h3>
              <code>&lt;figure&gt;</code>タグと、
              <code>&lt;figcaption&gt;</code>を利用します。
            </h3>
            <figure>
              <img
                src="img/logo.png"
                alt="Image alt text"
              >
              <figcaption>画像のキャプションを表示</figcaption>
            </figure>
          </div>
        </article>

        <article id="embedded__audio">
          <h2>Audio（オーディオ）</h2>
          <div>
            <audio controls="">audio</audio>
          </div>
        </article>

        <article id="embedded__video">
          <h2>Video（動画）</h2>
          <div>
            <video controls="">video</video>
          </div>
        </article>

        <article id="embedded__iframe">
          <h2>IFrame</h2>
          <div>
            <iframe
              src="./"
              height="300"
            ></iframe>
          </div>
        </article>

        <h2 id="forms-elements">Form elements</h2>

        <form>
          <fieldset id="forms__input">
            <legend>Input fields</legend>
            <p>
              <label for="input__text">Text Input</label>
              <input
                id="input__text"
                type="text"
                placeholder="Text Input"
              >
            </p>
            <p>
              <label for="input__password">Password</label>
              <input
                id="input__password"
                type="password"
                placeholder="Type your Password"
              >
            </p>
            <p>
              <label for="input__webaddress">Web Address</label>
              <input
                id="input__webaddress"
                type="url"
                placeholder="http://yoursite.com"
              >
            </p>
            <p>
              <label for="input__emailaddress">Email Address</label>
              <input
                id="input__emailaddress"
                type="email"
                placeholder="name@email.com"
              >
            </p>
            <p>
              <label for="input__phone">Phone Number</label>
              <input
                id="input__phone"
                type="tel"
                placeholder="(999) 999-9999"
              >
            </p>
            <p>
              <label for="input__search">Search</label>
              <input
                id="input__search"
                type="search"
                placeholder="Enter Search Term"
              >
            </p>
            <p>
              <label for="input__text2">Number Input</label>
              <input
                id="input__text2"
                type="number"
                placeholder="Enter a Number"
              >
            </p>
            <p>
              <label
                for="input__text3"
                class="error"
              >Error</label>
              <input
                id="input__text3"
                class="is-error"
                type="text"
                placeholder="Text Input"
              >
            </p>
            <p>
              <label
                for="input__text4"
                class="valid"
              >Valid</label>
              <input
                id="input__text4"
                class="is-valid"
                type="text"
                placeholder="Text Input"
              >
            </p>
          </fieldset>

          <fieldset id="forms__select">
            <legend>Select menus</legend>
            <p>
              <label for="select">Select</label>
              <select id="select">
                <optgroup label="Option Group">
                  <option>Option One</option>
                  <option>Option Two</option>
                  <option>Option Three</option>
                </optgroup>
              </select>
            </p>
          </fieldset>

          <fieldset id="forms__checkbox">
            <legend>Checkboxes</legend>
            <ul class="list list--bare">
              <li><label for="checkbox1"><input
                    id="checkbox1"
                    name="checkbox"
                    type="checkbox"
                    checked="checked"
                  >
                  Choice
                  A</label></li>
              <li><label for="checkbox2"><input
                    id="checkbox2"
                    name="checkbox"
                    type="checkbox"
                  > Choice B</label>
              </li>
              <li><label for="checkbox3"><input
                    id="checkbox3"
                    name="checkbox"
                    type="checkbox"
                  > Choice C</label>
              </li>
            </ul>
          </fieldset>

          <fieldset id="forms__radio">
            <legend>Radio buttons</legend>
            <ul class="list list--bare">
              <li><label for="radio1"><input
                    id="radio1"
                    name="radio"
                    type="radio"
                    class="radio"
                    checked="checked"
                  >
                  Option 1</label></li>
              <li><label for="radio2"><input
                    id="radio2"
                    name="radio"
                    type="radio"
                    class="radio"
                  > Option 2</label>
              </li>
              <li><label for="radio3"><input
                    id="radio3"
                    name="radio"
                    type="radio"
                    class="radio"
                  > Option 3</label>
              </li>
            </ul>
          </fieldset>

          <fieldset id="forms__textareas">
            <legend>Textareas</legend>
            <p>
              <label for="textarea">Textarea</label>
              <textarea
                id="textarea"
                rows="8"
                cols="48"
                placeholder="Enter your message here"
              ></textarea>
            </p>
          </fieldset>

          <fieldset id="forms__html5">
            <legend>HTML5 inputs</legend>
            <p>
              <label for="ic">Color input</label>
              <input
                type="color"
                id="ic"
                value="#000000"
              >
            </p>
            <p>
              <label for="in">Number input</label>
              <input
                type="number"
                id="in"
                min="0"
                max="10"
                value="5"
              >
            </p>
            <p>
              <label for="ir">Range input</label>
              <input
                type="range"
                id="ir"
                value="10"
              >
            </p>
            <p>
              <label for="idd">Date input</label>
              <input
                type="date"
                id="idd"
                value="1970-01-01"
              >
            </p>
            <p>
              <label for="idm">Month input</label>
              <input
                type="month"
                id="idm"
                value="1970-01"
              >
            </p>
            <p>
              <label for="idw">Week input</label>
              <input
                type="week"
                id="idw"
                value="1970-W01"
              >
            </p>
            <p>
              <label for="idt">Datetime input</label>
              <input
                type="datetime"
                id="idt"
                value="1970-01-01T00:00:00Z"
              >
            </p>
            <p>
              <label for="idtl">Datetime-local input</label>
              <input
                type="datetime-local"
                id="idtl"
                value="1970-01-01T00:00"
              >
            </p>
          </fieldset>

          <fieldset id="forms__action">
            <legend>Action buttons</legend>
            <p>
              <input
                type="submit"
                value="<input type=submit>"
              >
              <input
                type="button"
                value="<input type=button>"
              >
              <input
                type="reset"
                value="<input type=reset>"
              >
              <input
                type="submit"
                value="<input disabled>"
                disabled
              >
            </p>
            <p>
              <button type="submit">&lt;button type=submit&gt;</button>
              <button type="button">&lt;button type=button&gt;</button>
              <button type="reset">&lt;button type=reset&gt;</button>
              <button
                type="button"
                disabled
              >&lt;button disabled&gt;</button>
            </p>
          </fieldset>

        </form>
      </section>
    </main>

    <the-footer></the-footer>
</body>

</html>