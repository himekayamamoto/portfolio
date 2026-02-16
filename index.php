<?php
$path = './';
include $path . 'components/header.php'; ?>
<main>
  <section class="top" id="top">
    <div class="top__inner">
      <h1 class="top__title" id="top-title">Himeka<br>Yamamoto's<br>Portfolio</h1>
      <p class="top__subtitle" id="top-subtitle">Web Designer & Front-end Developer</p>
    </div>
  </section>
  <section class="hero" id="about">
    <h2>About</h2>
    <div class="hero__text">
      <p>Webサイトのコーディングを中心に、<br>
        デザインカンプに基づいた企業サイト・LP・WordPressサイトの構築をしています。<br>
      </p>
      <p>
        見た目の再現だけでなく「実際に使われること」を意識し、<br>
        画面幅ごとの見え方や操作感を丁寧に調整することを心がけています。<br>
        実務では、レスポンシブ対応・BEMを意識したCSS設計・アニメーション実装を通じて、<br>
        保守しやすく運用しやすい構造づくりに取り組んできました。<br>
      </p>
      <p>
        WordPressではオリジナルテーマの開発経験もあります。<br>
        ACFを使用したカスタマイズも実装も経験しており、<br>
        非エンジニアの方にも配慮したサイトづくりを心がけています。</p>

      <p>また、自社業務システムの改修や新機能追加において、<br>
        外注先と連携しながらフロントエンド部分の実装を担当してきました。<br>
        仕様書をもとにしたコーディングや、<br>
        実装観点からの改善提案を行うなど、<br>
        チーム間の橋渡しを意識した業務にも取り組んでいます。</p>
      <p>
        デザインやトレンドを取り入れつつ、<br>
        利用者や更新者の負担が少ないサイトづくりを大切にしています。<br>
        コーディングだけでなく、構造や運用面も含めて<br>
        「長く使われるWebサイト」に関われる仕事を目指しています。</p>
    </div>
    </p>
  </section>
  <section class="skills" id="skills">
    <h2>Skills</h2>
    <ul class="skills__list">
      <li class="skill__item">
        <span class="skill__name">HTML / CSS（SCSS）</span>
        <ul class="skill__detail">
          <li>BEMを意識したCSS設計</li>
          <li>レスポンシブ対応</li>
        </ul>
      </li>
      <li class="skill__item">
        <span class="skill__name">Git</span>
        <ul class="skill__detail">
          <li>少人数の体制ではありますが、CUI・GUIでのソース管理を行なっておりました</li>
        </ul>
      </li>
      <li class="skill__item">
        <span class="skill__name">WordPress</span>
        <ul class="skill__detail">
          <li>オリジナルテーマから作成</li>
          <li>ACFを使用したカスタマイズ等</li>
        </ul>
      </li>
      <li class="skill__item">
        <span class="skill__name">Adobe Illustrator / Photoshop</span>
        <ul class="skill__detail">
          <li>基本操作可能</li>
          <li>画像の書き出しや簡単な修正</li>
          <li>デザインデータを基にOGPの作成可能</li>
        </ul>
      </li>
      <li class="skill__item">
        <span class="skill__name">PHP</span>
        <ul class="skill__detail">
          <li>PhpStormを使用しての、基本的操作</li>
          <li>メールフォームの実装</li>
        </ul>
      </li>
    </ul>
  </section>
  <section class="works" id="works">
    <h2>Works</h2>
    <div class="works__scope">
      <p class="works__scope-title">共通：担当範囲</p>
      <ul class="works__scope-list">
        <li>デザインカンプをもとにしたコーディング</li>
        <li>レスポンシブ対応</li>
        <li>WordPress（オリジナルテーマ）構築</li>
        <li>ACFを用いた更新機能の設計</li>
        <li>非エンジニアでも更新しやすい管理画面設計</li>
        <li>ドメイン取得、SSL化、メールアドレス設定</li>
        <li>公開まで一人で担当</li>
      </ul>
    </div>
    <div class="works__list">
      <div class="works__item">
        <div class="works__item-img">
          <a href="https://izumimental.jp/" target="_blank">
            <img src="<?php echo $path; ?>assets/images/izumimental-ogp.jpg" alt="Work 2">
          </a>
        </div>
      </div>
      <div class="works__item-text">
        <h3>いずみがおかメンタルクリニック</h3>
        <p><a href="https://izumimental.jp/" target="_blank">https://izumimental.jp/</a></p>
        <p>
          医療機関の公式サイトとして、情報の分かりやすさと安心感を重視して制作しました。
          <br>
          デザインカンプをもとに、レスポンシブ対応を含めたコーディングを担当し、
          WordPressのオリジナルテーマを作成しています。
          <br>
          ACFを使用し、非エンジニアの方でも無理なく更新できる構成を意識しました。
          <br>
          また、ドメイン取得・SSL化・メールアドレス設定まで一貫して対応し、
          公開後の運用を見据えたサイト構築を行いました。
        </p>
      </div>
    </div>
    <div class="works__list">
      <div class="works__item">
        <div class="works__item-img">
          <a href="https://brooklyndesign.jp/" target="_blank">
            <img src="<?php echo $path; ?>assets/images/brooklyndesign-ogp.png" alt="Work 2">
          </a>
        </div>
      </div>
      <div class="works__item-text">
        <h3>BrooklynDesign</h3>
        <p><a href="https://brooklyndesign.jp/" target="_blank">https://brooklyndesign.jp/</a></p>
        <p>
          企業サイトとしての情報整理に加え、表現面にも挑戦した制作事例です。

          基本的な構成やWordPress設計は他案件と同様ですが、
          本案件では初めてパララックス表現やGSAPを用いたアニメーション実装に取り組みました。
          動きを取り入れつつも、過度にならないよう表示速度や操作感を意識しています。

          新しい技術についても、公式ドキュメントや実装例を調べながら導入し、
          実務レベルで使用できる形に落とし込みました。
        </p>
      </div>
    </div>
  </section>
  <section class="contact" id="contact">
    <h2>Contact</h2>
    <p>お問い合わせはこちらから</p>
    <form action="#" method="post">
      <input type="text" name="name" placeholder="お名前">
      <input type="email" name="email" placeholder="メールアドレス">
      <textarea name="message" placeholder="メッセージ"></textarea>
  </section>
</main>
<?php include $path . 'components/footer.php'; ?>