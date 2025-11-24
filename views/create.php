<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un Influenceur</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
  <h2 class="text-center mb-4 text-primary"> Ajouter un Influenceur</h2>

  <form method="POST" action="" class="card p-4 shadow-sm">
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Nom complet</label>
        <input type="text" name="full_name" class="form-control" required>
        </div>

      <div class="col-md-6">
        <label class="form-label">Alias</label>
        <input type="text" name="alias" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Adresse e-mail</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Niche</label>
        <input type="text" name="niche" class="form-control" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Nombre de followers</label>
        <input type="number" name="followers" class="form-control" required>
      </div>
    </div>

      <div class="col-md-6">
        <label class="form-label">Platform</label>
        <input type="text" name="platform" class="form-control" required>
      </div>

      

    <div class="d-flex justify-content-between mt-4">
      <a href="index.php" class="btn btn-secondary">⬅️ Retour</a>
      <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
  </form>
</div>

</body>
</html>