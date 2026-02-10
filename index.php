<?php
$path = './';
include $path . 'components/header.php'; ?>
<main>
  <section class="hero">
    <h2>About</h2>
    <p>Webサイトのコーディングを中心に、デザインカンプをもとにした企業サイト・LP・WordPressサイトの構築を行っています。
      見た目を再現するだけでなく、「実際に使われること」を意識し、画面幅ごとの見え方や操作感を丁寧に調整することを大切にしています。

      実務では、レスポンシブ対応やCSS設計、アニメーションの実装を通して、保守しやすく・運用しやすい構造を意識してきました。
      WordPressでは、既存テーマのカスタマイズだけでなく、オリジナルテーマでの開発も経験しています。</p>
  </section>
  <section class="skills">
    <ul>
      <li>HTML / CSS（SCSS）</li>
      <li>BEMを意識したCSS設計</li>
      <li>レスポンシブ対応（画面幅ごとの調整）</li>
      <li>Gitによるバージョン管理</li>
      <li>WordPress（オリジナルテーマ作成）</li>
      <li>Adobe Illustrator / Photoshop（簡単な修正・書き出し）</li>
    </ul>
  </section>
  <section class="direction">
    <h2>Direction</h2>
    <p>
      デザインやトレンドを取り入れつつも、
      実際に使う人・更新する人の負担が少ないサイト作りを大切にしたいと考えています。
    </p>
    <p>
      コーディングだけで完結せず、構造や運用面も含めて「長く使われるWebサイト」に関われる仕事をしていきたいです。
    </p>
  </section>
  <section class="works">
    <h2>Works</h2>
    <div class="works-list">
      <div class="works-item">
        <div class="works-item-img">
          <a href="#">
            <img src="<?php echo $path; ?>assets/img/work1.png" alt="Work 1">
          </a>
        </div>
        <div class="works-item-text">
          <h3>架空コーポレートサイト</h3>
          <p>https://example.com</p>
          <p>WordPressでは、
            非エンジニアが更新することを前提に
            ACF設計・入力ルールの整理まで行っています。</p>
          <p>ログインID：admin</p>
          <p>ログインパスワード：jg)%UZzU$U$jqtnkt2</p>
        </div>
      </div>
    </div>
    <div class="works-list">
      <div class="works-item">
        <div class="works-item-img">
          <a href="#">
            <img src="<?php echo $path; ?>assets/img/work2.png" alt="Work 2">
          </a>
        </div>
      </div>
      <div class="works-item-text">
        <h3>架空サイト</h3>
        <p>https://example.com</p>
        <p>ワイヤーフレームから作成しました。
          コンセプトは訪日外国人向けの観光情報サイトです。
          ツアーの１週間分のスケジュールを登録し、直近のツアーを表示するようにしました。
          ツアーの詳細ページには、ツアーの説明や料金、ガイドの紹介を設けました。
          またガイドの口コミを表示するようにしました。
        </p>
      </div>
    </div>
  </section>
</main>
<?php include $path . 'components/footer.php'; ?>