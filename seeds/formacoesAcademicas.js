
exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('formacoesAcademicas').del()
    .then(function () {
      // Inserts seed entries
      return knex('formacoesAcademicas').insert([
        {
        instituicao: "Escola Municipal Studio",
        curso: "Informatica Técnica",
        areaAcademica: "Informatica",
        dataInicial: "2010-01-20",
        dataFinal: "2021-12-20",
        usuario: 1
        }
      ]);
    });
};
