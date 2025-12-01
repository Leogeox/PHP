<link rel="stylesheet" href="/app/style/register.css">

<div class="form-container">
    <form action="" method="POST" class="form" novalidate>
  <p class="title">Inscription</p>
  <p class="message">Veuillez vous enregistrer pour avoir accès.</p>

  <div class="flex">
    <label>
      <input
        class="input"
        type="text"
        id="firstname"
        name="firstname"
        placeholder=""
        required
      />
      <span>Prénom d'utilisateur</span>
    </label>

    <label>
      <input
        class="input"
        type="text"
        id="lastname"
        name="lastname"
        placeholder=""
        required
      />
      <span>Nom d'utilisateur</span>
    </label>
  </div>

  <label>
    <input
      class="input"
      type="email"
      id="email"
      name="email"
      placeholder=""
      required
    />
    <span>Email</span>
  </label>

  <label>
    <input
      class="input"
      type="password"
      id="password"
      name="password"
      placeholder=""
      required
    />
    <span>Mot de passe</span>
  </label>

  <button type="submit" name="register" class="submit">S'inscrire</button>

</form>
</div>

