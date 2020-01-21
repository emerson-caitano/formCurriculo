
exports.seed = function(knex) {
  // Deletes ALL existing entries
  return knex('formacoesAcademicas').del()
    .then(function () {
      // Inserts seed entries
      return knex('formacoesAcademicas').insert([
        {
        formacaoAcademica: "Ensino Medio Técnico",
        instituicao: "Escola Municipal Studio",
        curso: "Informatica Técnica",
        areaAcademica: "Informatica",
        dataInicial: "09/02/2010",
        dataFinal: "20/12/2021",
        usuario: 1
        }
      ]);
    });
};
