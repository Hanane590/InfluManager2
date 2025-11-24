<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des Influenceurs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-4">
  <h2 class="text-center mb-4 text-primary"> Liste des Influenceurs</h2>

  <div class="text-end mb-3">
    <a href="index.php?action=create" class="btn btn-success">➕ Ajouter un Influenceur</a>
  </div>
  <div class="card mb-4 shadow-sm">
    <div class="card-body">
        <form method="GET" action="index.php" class="row g-3">

            <input type="hidden" name="action" value="search">

            <div class="col-md-4">
                <label class="form-label">Niche</label>
                <input type="text" name="niche" class="form-control"
                       placeholder="Ex: Fitness, Voyage">
            </div>

            <div class="col-md-4">
    <label class="form-label">Nom de l'influenceur</label>
    <input type="text" name="full_name" class="form-control"
           placeholder="Ex: John Doe">
</div>


            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">🔍 Rechercher</button>
            </div>

        </form>
    </div>
</div>


  <table class="table table-bordered table-striped shadow-sm align-middle">
    <thead class="table-dark text-center">
      <tr>
        <th>Nom complet</th>
        <th>Alias</th>
        <th>E-mail</th>
        <th>Niche</th>
        <th>Nombre de followers</th>
        <th>Platform</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($influencers as $inf): ?>
        <tr>
          <td><?= htmlspecialchars($inf['full_name']) ?></td>
          <td><?= htmlspecialchars($inf['alias']) ?></td>
          <td><?= htmlspecialchars($inf['email']) ?></td>
          <td><?= htmlspecialchars($inf['niche']) ?></td>
          <td><?= htmlspecialchars($inf['followers']) ?></td>
          <td><?= htmlspecialchars($inf['platform']) ?></td>
          

          <td class="text-center">
           <a href="index.php?action=edit&id=<?= $inf['_id'] ?>" class="btn btn-warning btn-sm">✏️ Modifier</a>
            <a href="index.php?action=delete&id=<?= $inf['_id'] ?>" class="btn btn-danger btn-sm"
               onclick="return confirm('Voulez-vous vraiment supprimer cet influenceur ?');">
               🗑️ Supprimer
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  
</div>

</body>
</html>