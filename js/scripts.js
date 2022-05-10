$(document).ready(function() {
    $('.delete-form').submit(function() {
        return confirm('削除しても良いですか？ YES / NO')
    });
    $('.delete-all-form').submit(function() {
        return confirm('全てを削除しても良いですか？ YES / NO')
    })
  });