
exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('certificados').del()
    .then(function () {
      // Inserts seed entries
      return knex('certificados').insert([
        {
          certificado: "Ensino Medio",
          descrição: "Certificado Formação Ensino",
          link: "http://www.certificado.com/12345",
          usuario: 1
        }
      ]);
    });
};
