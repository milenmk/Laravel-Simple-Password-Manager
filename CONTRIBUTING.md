How to contribute
=================

Bug reports and feature requests
--------------------------------

Issues are managed on [GitHub](https://github.com/milenmk/Laravel-Simple-Password-Manager/issues).
Default **language is english**. So please prepare your contributions in english.

1. Please [use the search engine](https://help.github.com/articles/searching-issues) to check if nobody's already reported your problem.
2. [Create an issue](https://help.github.com/articles/creating-an-issue). Choose an appropriate title. Prepend appropriately with Bug or Feature Request.
3. Write a report with as much detail as possible (Use [screenshots](https://help.github.com/articles/issue-attachments) or even screencast and provide logging and debugging
   information whenever possible).
4. Delete unnecessary submissions.
5. **Check your Message at Preview before sending.**

<a name="code"></a>Code
-----------------------

### Basic workflow

1. [Fork](https://help.github.com/articles/fork-a-repo) the [GitHub repository](https://github.com/milenmk/Laravel-Simple-Password-Manager).
2. Clone your fork.
3. Choose a branch(See the [Branches](#branches) section below).
4. Commit and push your changes.
5. [Make a pull request](https://help.github.com/articles/creating-a-pull-request).

<span id="branches" name="branches"></span>

### Branches

All pull requests should be made against the *develop* branch.

### General rules

Please don't edit the ChangeLog file.

### <a name="commits"></a>Commits

Use clear commit messages with the following structure:

```
[KEYWORD] [ISSUENUM] DESC

LONGDESC
```

where

#### Keyword

In uppercase.

The keyword can be omitted if your commit does not fit in any of the following categories:

- Fix/FIX: for a bug fix
- New/NEW: for an unreferenced new feature (Opening a feature request and using close is preferred)
- Close/CLOSE: for closing a referenced feature request

#### Issue number

If your commit fixes a referenced bug or feature request.

In the form of a # followed by the GitHub issue number.

#### Desc

A short description of the commit content.

This should ideally be less than 50 characters.

#### LongDesc

A long description of the commit content.

You can really go to town here and explain in depth what you've been doing.

Feel free to express technical details, use cases or anything relevant to the current commit.

This section can span multiple lines.

Try to keep lines under 120 characters.

#### Examples

<pre>
FIX|Fix #456 Short description (where #456 is number of bug fix, if it exists.)
or
NEW|New Short description (Use this if you add a feature not tracked, otherwise use CLOSE #456)
or
CLOSE|Close #456 Short description (where #456 is number of feature request, if it exists.)
or
Short description (when the commit is not introducing feature nor closing a bug)

Long description (Can span across multiple lines).
</pre>

### Pull Requests

Pull Request (PR) process is the process to submit a change (enhancement, bug fix, ...) into the code of the project. There is some rules to know and
a process to follow to optimize the chance to have PRs merged efficiently...

* A PR must be atomic. It means it must contain the lower possible changes for 1 need (1 bug fix or 1 new feature) without breaking usability of code. If a PR can be split into
  several PRs, it often means your PR is not atomic.

* When submitting a pull request, use same rule as [Commits](#commits) for the message. If your pull request only contains 1 commit, GitHub will be smart enough to fill it for
  you.
  Otherwise, please be a bit verbose about what you're providing.

Also, some code changes need a prior approbation:

* if you want to include a new external library (into htdocs/includes directory), please ask before to the core project manager (mention @milenmk in your issue) to see if such a
  library can be accepted.

* if you add a new tables or fields, you MUST first submit a standalone PR with the data structure changes you plan to add/modify (and only data structure changes). Start
  development only once this data structure has been accepted.

Once a PR has been submitted, you may need to wait for its integration. It is common that the project leader let the PR open for a long delay to allow every developer discuss
PR (A label is added in such a case).

If the label of PR start with "Draft" or "WIP" (Work In Progress), it will not be analyzed for merging until you change the label of the PR (but it can be analyzed for discussion).

If the PR is kept open for a long time, a tag will also be added on the PR to describe the status of your PR and why the PR is kept open. By putting your mouse on the tag, you will
get a full explanation of the tag/status that explain why your PR has not been integrated yet.

Translations
------------
The source language (en_US) is maintained in the repository.
