exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('certificados').del()
    .then(function () {
      // Inserts seed entries
      return knex('certificados').insert([
        {
          certificado: "Montagem e Manutenção de Microcomputador",
          descricao: "",
          instituicao: "Microlins",
          usuario: 1
        }
      ]);
    });
};